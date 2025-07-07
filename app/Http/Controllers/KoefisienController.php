<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Bapo;
use Illuminate\Http\Request;
use App\Models\HargaKandangan;
use Illuminate\Support\Facades\DB;
use PDF; // Gunakan facade untuk DomPDF
use Maatwebsite\Excel\Facades\Excel; // Gunakan facade untuk Maatwebsite Excel
use App\Exports\KoefisienExport;

class KoefisienController extends Controller
{
    /**
     * Menampilkan halaman utama untuk analisis koefisien harga.
     */
    public function index()
    {
        return view('admin.koefisien.index');
    }

    /**
     * Menghitung dan mengembalikan data koefisien harga untuk semua komoditas.
     */
    public function calculate(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $startDate = Carbon::parse($request->start_date);
        $endDate = Carbon::parse($request->end_date);

        // Ambil semua data harga dalam rentang tanggal yang dipilih
        $prices = HargaKandangan::whereBetween('tanggal', [$startDate, $endDate])
            ->orderBy('nama')
            ->get();

        if ($prices->count() < 2) {
            return response()->json(['error' => 'Data tidak cukup untuk melakukan perhitungan pada rentang tanggal ini.'], 422);
        }

        // PERBAIKAN: Grup data berdasarkan bapo_id untuk hasil yang unik
        $groupedByCommodity = $prices->groupBy('bapo_id');

        $results = $groupedByCommodity->map(function ($commodityPrices, $bapoId) {
            $prices = $commodityPrices->pluck('harga_terendah')->filter(fn($p) => is_numeric($p) && $p > 0);

            if ($prices->count() < 2) {
                return null; // Lewati jika data tidak cukup
            }

            $firstItem = $commodityPrices->first();
            $commodityName = $firstItem->nama . ' - ' . $firstItem->jenis;

            $mean = $prices->avg();
            $stdDev = $this->calculateStdDev($prices->all());
            $cv = ($mean > 0) ? ($stdDev / $mean) * 100 : 0;

            return [
                'komoditas' => $commodityName,
                'rata_rata' => 'Rp. ' . number_format($mean, 2, ',', '.'),
                'koefisien_variasi' => number_format($cv, 2) . '%',
                'level_fluktuasi' => $this->getFluctuationLevel($cv),
            ];
        })->filter()->values(); // Hapus item null dan re-index array

        $periode_analisis = $startDate->isoFormat('D MMMM') . ' - ' . $endDate->isoFormat('D MMMM YYYY');

        // Render view partial menjadi HTML
        $html = view('admin.koefisien._results_table', [
            'endDate' => $endDate,
            'startDate' => $startDate,
            'results' => $results,
            'periode_analisis' => $periode_analisis
        ])->render();

        return response()->json(['html' => $html]);
    }

    public function exportPdf(Request $request)
    {
        $data = $this->getKoefisienData($request->start_date, $request->end_date);
        $pdf = PDF::loadView('admin.koefisien.export_pdf', $data);
        return $pdf->download('laporan-koefisien-harga.pdf');
    }

    /**
     * Mengekspor hasil analisis ke Excel.
     */
    public function exportExcel(Request $request)
    {
        return Excel::download(new KoefisienExport($request->start_date, $request->end_date), 'laporan-koefisien-harga.xlsx');
    }

    public function getKoefisienData($startDate, $endDate)
    {

        $startDate = Carbon::parse($startDate);
        $endDate = Carbon::parse($endDate);

        // Ambil semua data harga dalam rentang tanggal yang dipilih
        $prices = HargaKandangan::whereBetween('tanggal', [$startDate, $endDate])
            ->orderBy('nama')
            ->get();

        if ($prices->count() < 2) {
            return response()->json(['error' => 'Data tidak cukup untuk melakukan perhitungan pada rentang tanggal ini.'], 422);
        }

        // PERBAIKAN: Grup data berdasarkan bapo_id untuk hasil yang unik
        $groupedByCommodity = $prices->groupBy('bapo_id');

        $results = $groupedByCommodity->map(function ($commodityPrices, $bapoId) {
            $prices = $commodityPrices->pluck('harga_terendah')->filter(fn($p) => is_numeric($p) && $p > 0);

            if ($prices->count() < 2) {
                return null; // Lewati jika data tidak cukup
            }

            $firstItem = $commodityPrices->first();
            $commodityName = $firstItem->nama . ' - ' . $firstItem->jenis;

            $mean = $prices->avg();
            $stdDev = $this->calculateStdDev($prices->all());
            $cv = ($mean > 0) ? ($stdDev / $mean) * 100 : 0;

            return [
                'komoditas' => $commodityName,
                'rata_rata' => 'Rp. ' . number_format($mean, 2, ',', '.'),
                'koefisien_variasi' => number_format($cv, 2) . '%',
                'level_fluktuasi' => $this->getFluctuationLevel($cv),
            ];
        })->filter()->values(); // Hapus item null dan re-index array

        $periode_analisis = $startDate->isoFormat('D MMMM') . ' - ' . $endDate->isoFormat('D MMMM YYYY');

        return [
            'results' => $results,
            'periode_analisis' => Carbon::parse($startDate)->isoFormat('D MMMM YYYY') . ' - ' . Carbon::parse($endDate)->isoFormat('D MMMM YYYY'),
            'startDate' => $startDate,
            'endDate' => $endDate,
            'tanggal_cetak' => Carbon::now()->isoFormat('D MMMM YYYY')
        ];
    }

    private function calculateStdDev(array $data)
    {
        $n = count($data);
        if ($n < 2)
            return 0;
        $mean = array_sum($data) / $n;
        $variance = array_sum(array_map(fn($x) => pow($x - $mean, 2), $data)) / ($n - 1);
        return sqrt($variance);
    }

    private function getFluctuationLevel($cv)
    {
        if ($cv < 5)
            return ['text' => 'Sangat Stabil', 'color' => 'bg-green-100 text-green-800'];
        if ($cv < 10)
            return ['text' => 'Stabil', 'color' => 'bg-blue-100 text-blue-800'];
        if ($cv < 20)
            return ['text' => 'Cukup Fluktuatif', 'color' => 'bg-yellow-100 text-yellow-800'];
        return ['text' => 'Sangat Fluktuatif', 'color' => 'bg-red-100 text-red-800'];
    }
}

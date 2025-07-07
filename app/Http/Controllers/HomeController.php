<?php

namespace App\Http\Controllers;

use App\Models\Bapo;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\HargaKandangan;
use App\Models\Komoditi;
use App\Models\VisitorCounter;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {



        // --- Data untuk Grafik ---
        $jenis_list = Bapo::with('komoditi')->get();


        // Ambil data chart awal untuk komoditas pertama
        $initial_id = optional($jenis_list->first())->id ?? 0;
        $initialChartData = $this->getChartDataForAdmin($initial_id, null, null);

        // Gabungkan semua data untuk dikirim ke view
        $data = [
            'jenis_list' => $jenis_list,
            'harga_chart_data' => $initialChartData['harga_chart_data'],
            'tanggal_chart_data' => $initialChartData['tanggal_chart_data'],
        ];

        return view('home', $data);
    }

    private function getChartDataForAdmin(?int $bahanPokokId, ?string $startDate, ?string $endDate)
    {
        if (!$bahanPokokId) {
            return ['harga_chart_data' => [], 'tanggal_chart_data' => []];
        }

        $bahanPokok = HargaKandangan::find($bahanPokokId);

        if (!$bahanPokok) {
            return ['harga_chart_data' => [], 'tanggal_chart_data' => []];
        }

        $query = HargaKandangan::select(
            DB::raw('DATE(tanggal) as tanggal_grup'),
            DB::raw('AVG(harga_terendah) as harga_rata_rata')
        )
            // ->where('nama', $bahanPokok->nama)
            ->where('bapo_id', $bahanPokok->id)
            ->groupBy('tanggal_grup')
            ->orderBy('tanggal_grup', 'ASC');

        if ($startDate && $endDate) {
            $query->whereBetween('tanggal', [$startDate, $endDate]);
        } else {
            $tanggalTerakhirUpdate = HargaKandangan::where('nama', $bahanPokok->nama)
                ->where('jenis', $bahanPokok->jenis)
                ->max('tanggal');

            if ($tanggalTerakhirUpdate) {
                $endDefault = Carbon::parse($tanggalTerakhirUpdate);
                $startDefault = $endDefault->copy()->subDays(29);
                $query->whereBetween('tanggal', [$startDefault, $endDefault]);
            }
        }

        $chartData = $query->get();

        $harga_data = $chartData->pluck('harga_rata_rata')->toArray();
        $tanggal_data = $chartData->pluck('tanggal_grup')->map(function ($date) {
            return Carbon::parse($date)->format('Y-m-d');
        })->toArray();

        return [
            'harga_chart_data' => $harga_data,
            'tanggal_chart_data' => $tanggal_data,
        ];
    }

}

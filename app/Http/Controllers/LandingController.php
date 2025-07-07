<?php

namespace App\Http\Controllers;

use PDF;
use Carbon\Carbon;
use App\Models\Bapo;
use App\Models\Berita;
// use Barryvdh\DomPDF\PDF;
use App\Models\HargaBjm;
use App\Models\HargaNegara;
use App\Exports\HargaExport;
use App\Models\HargaTanjung;
use Illuminate\Http\Request;
use App\Models\HargaKandangan;
use App\Models\VisitorCounter;
use App\Exports\HargaBjmExport;
use App\Charts\HargaPanganChart;
use App\Services\LandingService;
use App\Exports\HargaNegaraExport;
use Illuminate\Support\Facades\DB;
use App\Exports\HargaTanjungExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\HargaKandanganExport;
use App\Exports\HomeHargaPanganExport;
use App\Exports\DetailHargaPanganExport;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class LandingController extends Controller
{
    public function __construct()
    {
        $this->service = new LandingService;
        $this->chart = new LarapexChart;
        $this->visit = new VisitorCounter;
    }

    public function index()
    {
        // PERBAIKAN: Menggunakan satu array $data untuk semua variabel
        $data = [];

        // --- Data untuk Halaman ---
        $data['table'] = $this->service->getAll();
        $data['bapo'] = Bapo::with('komoditi')->get();
        $data['tanggal_update'] = HargaKandangan::latest('tanggal')->first();
        $data['berita'] = Berita::where('status', 'Publish')->limit(6)->get();

        // --- Data untuk Statistik Pengunjung ---
        $this->visit->visitsCounter()->forceIncrement();
        $data['visit_count_day'] = $this->visit->visitsCounter()->period('day')->count();
        $data['visit_count_month'] = $this->visit->visitsCounter()->period('month')->count();
        $data['visit_count_year'] = $this->visit->visitsCounter()->period('year')->count();

        // --- Data untuk Filter Dropdown ---
        $data['jenis_list'] = Bapo::with('komoditi')->get();

        // --- Data Awal untuk Chart ---
        $initial_id = optional($data['jenis_list']->first())->id ?? 0;
        $initialChartData = $this->getChartData($initial_id, null, null);

        // Gabungkan data chart ke dalam array data utama
        $data['harga_chart_data'] = $initialChartData['harga_chart_data'];
        $data['tanggal_chart_data'] = $initialChartData['tanggal_chart_data'];
        $data['show_banner'] = true;

        // Kirim array data tunggal ke view. Laravel akan mengekstrak setiap key menjadi variabel.
        return view('landing.index', $data);
    }


    /**
     * Menangani permintaan AJAX untuk memfilter data chart.
     */
    public function filterChart(Request $request)
    {
        // Validasi input dari permintaan AJAX
        $validator = Validator::make($request->all(), [
            'id' => 'required|integer|exists:tbl_master_harga,id',
            'start_date' => 'nullable|date_format:Y-m-d',
            'end_date' => 'nullable|date_format:Y-m-d|after_or_equal:start_date',
        ]);

        // Jika validasi gagal, kembalikan error dalam format JSON
        if ($validator->fails()) {
            return response()->json(['error' => 'Input tidak valid.', 'messages' => $validator->errors()], 422);
        }

        $validated = $validator->validated();

        // Ambil data chart berdasarkan filter yang divalidasi
        $filteredData = $this->getChartData(
            $validated['id'],
            $validated['start_date'] ?? null,
            $validated['end_date'] ?? null
        );

        // Kembalikan data dalam format JSON
        return response()->json($filteredData);
    }

    /**
     * Fungsi private untuk mengambil dan memproses data chart.
     */
    private function getChartData(?int $bahanPokokId, ?string $startDate, ?string $endDate)
    {
        if (!$bahanPokokId) {
            return ['harga_chart_data' => [], 'tanggal_chart_data' => []];
        }

        // PERBAIKAN: Cari komoditas di tabel yang benar
        $bahanPokok = HargaKandangan::find($bahanPokokId);

        if (!$bahanPokok) {
            return ['harga_chart_data' => [], 'tanggal_chart_data' => []];
        }

        // Query dasar untuk mengambil data harga
        $query = HargaKandangan::select(
            DB::raw('DATE(tanggal) as tanggal_grup'),
            DB::raw('AVG(harga_terendah) as harga_rata_rata')
        )
            // ->where('nama', $bahanPokok->nama)
            // ->where('jenis', $bahanPokok->jenis)
            ->where('bapo_id', $bahanPokok->id)
            ->groupBy('tanggal_grup')
            ->orderBy('tanggal_grup', 'ASC');

        // Terapkan filter tanggal jika ada
        if ($startDate && $endDate) {
            $query->whereBetween('tanggal', [$startDate, $endDate]);
        } else {
            // Jika tidak, gunakan default 30 hari terakhir dari data terbaru
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

        // Format data untuk dikirim ke JavaScript
        $harga_data = $chartData->pluck('harga_rata_rata')->toArray();
        $tanggal_data = $chartData->pluck('tanggal_grup')->map(function ($date) {
            return Carbon::parse($date)->format('d M');
        })->toArray();

        return [
            'harga_chart_data' => $harga_data,
            'tanggal_chart_data' => $tanggal_data,
        ];
    }

    public function detail($id)
    {
        $data['id'] = $id;
        $data['table'] = HargaKandangan::where('bapo_id', $id)->orderBy('tanggal', 'DESC')->groupBy("tanggal")->get();
        $data['nama_komoditas'] = HargaKandangan::where('bapo_id', $id)->first();
        $data['jenis_list'] = HargaKandangan::select('id', 'nama', 'jenis')->where('bapo_id', $id)->get();
        // --- Data Awal untuk Chart ---
        $initial_id = optional($data['jenis_list']->first())->id ?? 0;
        $initialChartData = $this->getChartData($initial_id, null, null);

        // Gabungkan data chart ke dalam array data utama
        $data['harga_chart_data'] = $initialChartData['harga_chart_data'];
        $data['tanggal_chart_data'] = $initialChartData['tanggal_chart_data'];
        // dd($data['visit_count_week']);

        return view('landing.detail', $data);
    }

    public function indexberita()
    {
        $berita = Berita::paginate(10);
        // dd($data['visit_count_week']);
        return view('landing.berita', compact('berita'));
    }

    public function indexdetailberita($id)
    {
        $berita = Berita::where('id', $id)->first();
        // dd($data['visit_count_week']);
        return view('landing.detail-berita', compact('berita'));
    }

    public function indexgrafik()
    {
        $data['harga_chart_kandangan'] = HargaKandangan::where('jenis', 'lokal')->orderBy('tanggal', 'ASC')->groupBy("tanggal")->get();
        $data['tanggal'] = HargaKandangan::where('jenis', 'lokal')->orderBy('tanggal', 'ASC')->groupBy("tanggal")->get();
        $data['bapo'] = Bapo::with('komoditi')->get();
        $data['tanggal_update'] = HargaKandangan::latest('tanggal')->first();
        // dd($data['table']);

        return view('landing.grafik.index', $data);
    }

    public function indexsemua()
    {
        $data['table'] = $this->service->getAll();
        $data['tanggal_update'] = HargaKandangan::latest('tanggal')->first();

        return view('landing.semua.index', $data);
    }

    public function indexkandangan()
    {
        $data['table'] = $this->service->getAll();
        $data['tanggal_update'] = HargaKandangan::latest('tanggal')->first();
        // dd($data['tanggal_update']);

        return view('landing.kandangan.index', $data);
    }

    public function filtertable(Request $request)
    {
        if ($request->input('type') == 'semua') {
            $data['table'] = $this->service->filterData($request->all());
            return view('landing.semua.filter', $data);
        }
        if ($request->input('type') == 'kandangan') {
            $data['table'] = $this->service->filterData($request->all());
            return view('landing.kandangan.filter', $data);
        }
    }

    public function filter(Request $request)
    {
        // Jika permintaan datang dari DataTables (melalui AJAX)
        if ($request->ajax()) {
            $query = HargaKandangan::query()
                ->where('nama', $request->input('nama'));

            // Terapkan filter rentang tanggal jika ada
            if ($request->filled('start_date') && $request->filled('end_date')) {
                $query->whereBetween('tanggal', [$request->input('start_date'), $request->input('end_date')]);
            }

            return DataTables::of($query)
                ->editColumn('tanggal', function ($row) {
                    return Carbon::parse($row->tanggal)->format('d F Y');
                })
                ->editColumn('harga_terendah', function ($row) {
                    return 'Rp. ' . number_format($row->harga_terendah, 0, ',', '.');
                })
                ->rawColumns(['harga_terendah']) // Memberitahu DataTables bahwa kolom ini tidak perlu di-escape
                ->make(true);
        }

        // --- Logika untuk Chart (jika dipanggil oleh filter chart) ---
        $nama = $request->input('nama');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $queryChart = HargaKandangan::where('nama', $nama);
        if ($startDate && $endDate) {
            $queryChart->whereBetween('tanggal', [$startDate, $endDate]);
        }
        $chartData = $queryChart->orderBy('tanggal', 'asc')->get();

        $harga_data = $chartData->pluck('harga_terendah')->toArray();
        $tanggal_data = $chartData->pluck('tanggal')->map(function ($date) {
            return Carbon::parse($date)->format('Y-m-d');
        })->toArray();

        // Kembalikan hanya data chart jika bukan permintaan DataTables
        return response()->json([
            'harga_data' => $harga_data,
            'tanggal_data' => $tanggal_data,
        ]);
    }

    public function filtergrafik(Request $request)
    {
        $from = $request->input('tanggal_mulai');
        $to = $request->input('tanggal_akhir');
        // dd($from);
        if ($from == null && $to == null) {
            if ($request->input('pasar') == 1) {
                $data['harga_chart_kandangan'] = HargaKandangan::where('jenis', $request->input('nama'))->orderBy('tanggal', 'ASC')->groupBy("tanggal")->get();
                $data['tanggal'] = HargaKandangan::where('jenis', $request->input('nama'))->orderBy('tanggal', 'ASC')->groupBy("tanggal")->get();
                $data['bapo'] = Bapo::with('komoditi')->get();

                return view('landing.grafik.filter', $data);
            }
            if ($request->input('pasar') == 2) {
                $data['harga_chart_kandangan'] = HargaKandangan::where('jenis', $request->input('nama'))->orderBy('tanggal', 'ASC')->groupBy("tanggal")->get();
                $data['tanggal'] = HargaKandangan::where('jenis', $request->input('nama'))->orderBy('tanggal', 'ASC')->groupBy("tanggal")->get();
                $data['bapo'] = Bapo::with('komoditi')->get();

                return view('landing.grafik.filter_kandangan', $data);
            }
        } else {
            if ($request->input('pasar') == 1) {
                $data['harga_chart_kandangan'] = HargaKandangan::where('jenis', $request->input('nama'))->orderBy('tanggal', 'ASC')->whereBetween('tanggal', [$from, $to])->groupBy("tanggal")->get();
                $data['tanggal'] = HargaKandangan::where('jenis', $request->input('nama'))->orderBy('tanggal', 'ASC')->whereBetween('tanggal', [$from, $to])->groupBy("tanggal")->get();
                $data['bapo'] = Bapo::with('komoditi')->get();

                return view('landing.grafik.filter', $data);
            }
            if ($request->input('pasar') == 2) {
                $data['harga_chart_kandangan'] = HargaKandangan::where('jenis', $request->input('nama'))->orderBy('tanggal', 'ASC')->whereBetween('tanggal', [$from, $to])->groupBy("tanggal")->get();
                $data['tanggal'] = HargaKandangan::where('jenis', $request->input('nama'))->orderBy('tanggal', 'ASC')->whereBetween('tanggal', [$from, $to])->groupBy("tanggal")->get();
                $data['bapo'] = Bapo::with('komoditi')->get();

                return view('landing.grafik.filter_kandangan', $data);
            }
        }
    }

    public function excelharga(Request $request)
    {
        $tanggal = $request->input('tanggal');
        return Excel::download(new HargaExport($tanggal), 'siharapan.xlsx');
    }

    public function excelhargakandangan(Request $request)
    {
        $tanggal = $request->input('tanggal');
        return Excel::download(new HargaKandanganExport($tanggal), 'siharapan.xlsx');
    }


    public function profile()
    {

        return view('landing/profile');
    }

    public function struktur()
    {

        return view('landing/struktur');
    }

    public function getDetailData(Request $request, $id)
    {
        $bahanPokok = HargaKandangan::findOrFail($id);

        $query = HargaKandangan::query()
            ->where('bapo_id', $bahanPokok->id);

        // Terapkan filter rentang tanggal jika ada
        if ($request->filled('start_date') && $request->filled('end_date')) {
            $query->whereBetween('tanggal', [$request->input('start_date'), $request->input('end_date')]);
        }

        return DataTables::of($query)
            ->editColumn('tanggal', function ($row) {
                return Carbon::parse($row->tanggal)->isoFormat('D MMMM YYYY');
            })
            ->editColumn('harga_terendah', function ($row) {
                return 'Rp ' . number_format($row->harga_terendah, 0, ',', '.');
            })
            ->editColumn('harga_grosir', function ($row) {
                return 'Rp ' . number_format($row->harga_grosir, 0, ',', '.');
            })
            ->editColumn('harga_kios', function ($row) {
                return 'Rp ' . number_format($row->harga_kios, 0, ',', '.');
            })
            ->rawColumns(['harga_terendah', 'harga_grosir', 'harga_kios'])
            ->make(true);
    }

    public function pdf()
    {
        $data['table'] = $this->service->getAll();
        $data['tanggal_cetak'] = Carbon::now()->isoFormat('D MMMM YYYY');
        $pdf = PDF::loadView('landing.exports.hometable_pdf', $data);
        return $pdf->download('laporan-harga-pangan-harian.pdf');
    }

    /**
     * Mengekspor data dari tabel halaman utama ke Excel.
     */
    public function excel()
    {
        return Excel::download(new HomeHargaPanganExport($this->service), 'laporan-harga-pangan-harian.xlsx');
    }

    public function exportDetailPdf(Request $request, $id)
    {
        // PERBAIKAN: Meningkatkan batas sumber daya untuk proses berat
        ini_set('max_execution_time', 300); // 300 detik = 5 menit
        ini_set('memory_limit', '512M');

        try {
            $data = $this->getFilteredDataForExport($request, $id);

            if ($data['data']->isEmpty()) {
                return back()->with('error', 'Tidak ada data untuk diekspor pada rentang yang dipilih.');
            }

            $pdf = PDF::loadView('landing.exports.detail_pdf', $data);
            return $pdf->download('laporan-detail-harga-' . $data['komoditas'] . '.pdf');

        } catch (\Exception $e) {
            // PERBAIKAN: Log error yang sebenarnya untuk developer
            Log::error('Gagal membuat PDF: ' . $e->getMessage());

            // Kembalikan pesan yang lebih user-friendly
            return back()->with('error', 'Gagal membuat PDF karena terlalu banyak data atau terjadi kesalahan server.');
        }
    }

    public function exportDetailExcel(Request $request, $id)
    {
        return Excel::download(new DetailHargaPanganExport($id, $request->start_date, $request->end_date), 'laporan-detail-harga.xlsx');
    }

    private function getFilteredDataForExport(Request $request, $id)
    {
        $komoditas = HargaKandangan::findOrFail($id);
        $query = HargaKandangan::query()
            // ->where('nama', $komoditas->nama)
            ->where('bapo_id', $komoditas->id);

        if ($request->filled('start_date') && $request->filled('end_date')) {
            $query->whereBetween('tanggal', [$request->input('start_date'), $request->input('end_date')]);
        }

        return [
            'data' => $query->orderBy('tanggal', 'desc')->get(),
            'komoditas' => $komoditas->nama . ' - ' . $komoditas->jenis,
            'tanggal_cetak' => Carbon::now()->isoFormat('D MMMM YYYY')
        ];
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Bapo;
use App\Models\HargaBjm;
use App\Models\HargaNegara;
use App\Exports\HargaExport;
use App\Models\HargaTanjung;
use Illuminate\Http\Request;
use App\Models\HargaKandangan;
use App\Models\VisitorCounter;
use App\Exports\HargaBjmExport;
use App\Services\LandingService;
use App\Exports\HargaNegaraExport;
use App\Exports\HargaTanjungExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\HargaKandanganExport;
use App\Models\Berita;

class LandingController extends Controller
{
    public function __construct()
    {
        $this->service = new LandingService;
    }

    public function index(VisitorCounter $VisitorCounter)
    {
        $bapo_count = Bapo::count();
        $data['bahan'] = HargaKandangan::orderBy('tanggal', 'desc')->limit($bapo_count)->get();
        $data['bahan'] = HargaKandangan::latest('tanggal')->get();
        $data['table'] = $this->service->getAll();
        $data['harga_chart'] = HargaKandangan::where('jenis', 'lokal')->orderBy('tanggal', 'ASC')->groupBy("tanggal")->get();
        $data['tanggal'] = HargaKandangan::where('jenis', 'lokal')->orderBy('tanggal', 'ASC')->groupBy("tanggal")->get();
        $data['bapo'] = Bapo::with('komoditi')->get();
        $data['tanggal_update'] = HargaKandangan::latest('tanggal')->first();
        // $VisitorCounter = VisitorCounter::find(1);
        $VisitorCounter->visitsCounter()->forceIncrement();
        $VisitorCounter->visitsCounter()->count();
        $data['visit_count'] = $VisitorCounter->visitsCounter()->count();
        $data['visit_count_day'] = $VisitorCounter->visitsCounter()->period('day')->count();
        $data['visit_count_month'] = $VisitorCounter->visitsCounter()->period('month')->count();
        $data['visit_count_year'] = $VisitorCounter->visitsCounter()->period('year')->count();
        $data['berita'] = Berita::limit(6)->get();
        // dd($data['visit_count_week']);

        return view('landing.index', $data);
    }

    public function detail($id)
    {
        $bapo_count = Bapo::count();
        $data['bahan'] = HargaKandangan::orderBy('tanggal', 'desc')->limit($bapo_count)->get();
        $data['bahan'] = HargaKandangan::latest('tanggal')->get();
        $data['table'] = HargaKandangan::where('bapo_id', $id)->orderBy('tanggal', 'ASC')->groupBy("tanggal")->get();
        $data['harga_chart'] = HargaKandangan::where('bapo_id', $id)->orderBy('tanggal', 'ASC')->groupBy("tanggal")->get();
        $data['tanggal'] = HargaKandangan::where('bapo_id', $id)->orderBy('tanggal', 'ASC')->groupBy("tanggal")->get();
        $data['bapo'] = Bapo::with('komoditi')->get();
        $data['tanggal_update'] = HargaKandangan::latest('tanggal')->first();
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
        $data['harga_chart'] = HargaKandangan::where('jenis', $request->input('nama'))->orderBy('tanggal', 'ASC')->groupBy("tanggal")->get();
        $data['tanggal'] = HargaKandangan::where('jenis', $request->input('nama'))->orderBy('tanggal', 'ASC')->groupBy("tanggal")->get();
        return view('landing.filter', $data);
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
        }
        else {
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
}

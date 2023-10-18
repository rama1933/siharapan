<?php

namespace App\Http\Controllers;

use App\Imports\HargaBjmImport;
use Illuminate\Http\Request;
use App\Services\HargaService;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\HargaKandanganImport;
use App\Imports\HargaNegaraImport;
use App\Imports\HargaTanjungImport;
use App\Models\Bapo;
use App\Models\HargaBjm;
use App\Models\HargaKandangan;
use App\Models\HargaNegara;
use App\Models\HargaTanjung;
use App\Models\Komoditi;

class HargaController extends Controller
{
    //

    public function __construct()
    {
        $this->service = new HargaService;
    }

    public function indexkandangan()
    {
        return view('admin.harga.kandangan.index');
    }


    public function data(Request $request)
    {
        switch ($request->type) {
            case 'kandangan':
                $data = $this->service->getDataHargaKandangan();
                break;
            default:
                $data = collect();
                break;
        }

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('tanggal', function ($data) use ($request) {
            $tanggal = date('d-m-Y', strtotime($data->tanggal));
            return $tanggal;
        })
            ->addColumn('harga_terendah', function ($data) use ($request) {
            $harga_terendah = 'Rp. ' . number_format($data->harga_terendah, 0, ',', '.');
            return $harga_terendah;
        })

            ->addColumn('button', function ($data) use ($request) {
            return '
                                        <button onclick="edit(' . $data->id . ')" data-toggle="modal" data-target="#modal-edit" class="btn btn-sm btn-flat btn-primary my-2"><i class="fa fa-edit"></i></button>
                                        <button onclick="deletebtn(' . $data->id . ')" class="btn btn-sm btn-flat btn-danger my-2"><i class="fa fa-trash"></i></button>
                                    ';
        })

            ->rawColumns(['button', 'tanggal', 'harga_terendah'])
            ->make(true);
    }

    public function store(Request $request)
    {
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        // menangkap file excel
        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = rand() . $file->getClientOriginalName();

        // upload ke folder file di dalam folder public
        $file->move('file', $nama_file);

        $tanggal = $request->input('tanggal');
        // import data
        Excel::import(new HargaKandanganImport($tanggal), public_path('/file/' . $nama_file));

        // notifikasi dengan session
        return response()->json([
            "status" => "success",
            "messages" => "Berhasil Import Data",
        ]);
    }


    public function deletedata(Request $request)
    {
        switch ($request->type) {
            case 'kandangan':
                $data = $this->service->deleteDataHargaKandangan($request->all());
                break;
            default:
                $data = collect();
                break;
        }
        if ($data == true) {
            return response()->json([
                "status" => "success",
                "messages" => "Berhasil Menghapus Data",
            ]);
        }
        else {
            return response()->json([
                "status" => "failed",
                "messages" => "Gagal Menghapus Data",
            ]);
        }
    }
}

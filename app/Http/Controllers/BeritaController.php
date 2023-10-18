<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use App\Services\BeritaServices;

class BeritaController extends Controller
{

    public function __construct()
    {
        $this->service = new BeritaServices;
    }

    public function index()
    {
        return view('admin.berita.index');
    }

    public function data(Request $request)
    {
        switch ($request->type) {
            case 'berita':
                $data = $this->service->getDataBerita();
                break;
            default:
                $data = collect();
                break;
        }

        return DataTables::of($data)
            ->addIndexColumn()

            ->addColumn('button', function ($data) use ($request) {
            return '
                                        <button onclick="edit(' . $data->id . ')" data-toggle="modal" data-target="#modal-edit" class="btn btn-sm btn-flat btn-primary my-2"><i class="fa fa-edit"></i></button>
                                        <button onclick="deletebtn(' . $data->id . ')" class="btn btn-sm btn-flat btn-danger my-2"><i class="fa fa-trash"></i></button>
                                    ';
        })
            ->addColumn('foto', function ($data) use ($request) {
            if ($data == null) {
                $foto = '';
            }
            else {
                $foto = '
                  <a class="profile-img" href="' . asset('/storage') . '/' . $data->path . '" target="_blank">
                                        <img style="border-radius: 10px" width="50px" src="' . asset('/storage') . '/' . $data->path . '" target="_blank" alt="product">
                                    </a>
                                    ';
            }
            return $foto;
        })
            ->rawColumns(['button', 'foto'])
            ->make(true);
    }

    public function show(Request $request)
    {
        $id = $request->id;
        switch ($request->type) {
            case 'berita':
                $data = $this->service->getDataBerita($id);
                break;
            default:
                $data = collect();
                break;
        }
        if ($request->type == 'berita') {
            return response()->json(
            [
                'id' => $data->id,
                'judul' => $data->judul,
                'berita' => $data->berita,
                'path' => $data->path,
            ]
            );
        }
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $data = $this->service->delete($id);
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


    public function store(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            // 'nama' => 'required|unique:tbl_master_Berita,nama',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => "failed",
                "message" => $validator->errors()->first(),
            ]);
        }
        else {
            $store = $this->service->storeBerita($request);
            if ($store == true) {
                return response()->json([
                    "status" => "success",
                    "messages" => "Berhasil Menambahkan Data",
                ]);
            }
            else {
                return response()->json([
                    "status" => "failed",
                    "messages" => "Gagal Menambahkan Data",
                ]);
            }
        }
    }


    public function update(Request $request)
    {
        $id = $request->id;
        $validator = Validator::make(request()->all(), [
            // 'nama' => 'required|unique:tbl_master_Berita,nama,' . $id,
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => "failed",
                "message" => $validator->errors()->first(),
            ]);
        }
        else {
            $store = $this->service->updateBerita($id, $request->all());
            if ($store == true) {
                return response()->json([
                    "status" => "success",
                    "messages" => "Berhasil memperbaharui Data",
                ]);
            }
            else {
                return response()->json([
                    "status" => "failed",
                    "messages" => "Gagal memperbaharui Data",
                ]);
            }
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Komoditi;
use App\Models\Satuan;
use Illuminate\Http\Request;
use App\Services\MasterService;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;

class MasterController extends Controller
{
    //
    public function __construct()
    {
        $this->service = new MasterService;
    }

    public function indexsatuan()
    {
        return view('admin.master.satuan.index');
    }

    public function indexkomoditi()
    {
        return view('admin.master.komoditi.index');
    }

    public function indexbapo()
    {
        $data['satuan'] = Satuan::get();
        $data['komoditi'] = Komoditi::get();
        return view('admin.master.bapo.index', $data);
    }

    public function data(Request $request)
    {
        switch ($request->type) {
            case 'satuan':
                $data = $this->service->getDataSatuan();
                break;
            case 'komoditi':
                $data = $this->service->getDataKomoditi();
                break;
            case 'bapo':
                $data = $this->service->getDataBapo();
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
            ->addColumn('buttonbapo', function ($data) use ($request) {
                return '
                     <button onclick="edit(' . $data->id . ')" data-toggle="modal" data-target="#modal-edit" class="btn btn-sm btn-flat btn-primary my-2"><i class="fa fa-edit"></i></button>
                    <button onclick="deletebtn(' . $data->id . ')" class="btn btn-sm btn-flat btn-danger my-2"><i class="fa fa-trash"></i></button>
                                    ';
            })

            ->rawColumns(['button', 'buttonbapo'])
            ->make(true);
    }

    public function showdata(Request $request)
    {
        $id = $request->id;
        switch ($request->type) {
            case 'satuan':
                $data = $this->service->getDataSatuan($id);
                break;
            case 'komoditi':
                $data = $this->service->getDataKomoditi($id);
                break;
            case 'bapo':
                $data = $this->service->getDataBapo($id);
                break;
            default:
                $data = collect();
                break;
        }
        if ($request->type == 'satuan') {
            return response()->json(
                [
                    'id' => $data->id,
                    'nama' => $data->nama,
                ]
            );
        } elseif ($request->type == 'komoditi') {
            return response()->json(
                [
                    'id' => $data->id,
                    'nama' => $data->nama,
                ]
            );
        } elseif ($request->type == 'bapo') {
            return response()->json(
                [
                    'id' => $data->id,
                    'nama' => $data->nama,
                    'satuan_id' => $data->satuan_id,
                    'komoditi_id' => $data->komoditi_id,
                ]
            );
        }
    }

    public function deletedata(Request $request)
    {
        $id = $request->id;
        switch ($request->type) {
            case 'satuan':
                $data = $this->service->deleteDataSatuan($id);
                break;
            case 'komoditi':
                $data = $this->service->deleteDataKomoditi($id);
                break;
            case 'bapo':
                $data = $this->service->deleteDataBapo($id);
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
        } else {
            return response()->json([
                "status" => "failed",
                "messages" => "Gagal Menghapus Data",
            ]);
        }
    }


    public function storesatuan(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'nama' => 'required|unique:tbl_master_satuan,nama',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => "failed",
                "message" => $validator->errors()->first(),
            ]);
        } else {
            $store = $this->service->storeSatuan($request->all());
            if ($store == true) {
                return response()->json([
                    "status" => "success",
                    "messages" => "Berhasil Menambahkan Data",
                ]);
            } else {
                return response()->json([
                    "status" => "failed",
                    "messages" => "Gagal Menambahkan Data",
                ]);
            }
        }
    }


    public function updatesatuan(Request $request)
    {
        $id = $request->id;
        $validator = Validator::make(request()->all(), [
            'nama' => 'required|unique:tbl_master_satuan,nama,' . $id,
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => "failed",
                "message" => $validator->errors()->first(),
            ]);
        } else {
            $store = $this->service->updateSatuan($id, $request->all());
            if ($store == true) {
                return response()->json([
                    "status" => "success",
                    "messages" => "Berhasil memperbaharui Data",
                ]);
            } else {
                return response()->json([
                    "status" => "failed",
                    "messages" => "Gagal memperbaharui Data",
                ]);
            }
        }
    }

    public function storekomoditi(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'nama' => 'required|unique:tbl_master_komoditi,nama',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => "failed",
                "message" => $validator->errors()->first(),
            ]);
        } else {
            $store = $this->service->storeKomoditi($request->all());
            if ($store == true) {
                return response()->json([
                    "status" => "success",
                    "messages" => "Berhasil Menambahkan Data",
                ]);
            } else {
                return response()->json([
                    "status" => "failed",
                    "messages" => "Gagal Menambahkan Data",
                ]);
            }
        }
    }


    public function updatekomoditi(Request $request)
    {
        $id = $request->id;
        $validator = Validator::make(request()->all(), [
            'nama' => 'required|unique:tbl_master_komoditi,nama,' . $id,
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => "failed",
                "message" => $validator->errors()->first(),
            ]);
        } else {
            $store = $this->service->updateKomoditi($id, $request->all());
            if ($store == true) {
                return response()->json([
                    "status" => "success",
                    "messages" => "Berhasil memperbaharui Data",
                ]);
            } else {
                return response()->json([
                    "status" => "failed",
                    "messages" => "Gagal memperbaharui Data",
                ]);
            }
        }
    }

    public function storebapo(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'nama' => 'required|unique:tbl_master_bahan_pokok,nama',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => "failed",
                "message" => $validator->errors()->first(),
            ]);
        } else {
            $store = $this->service->storeBapo($request->all());
            if ($store == true) {
                return response()->json([
                    "status" => "success",
                    "messages" => "Berhasil Menambahkan Data",
                ]);
            } else {
                return response()->json([
                    "status" => "failed",
                    "messages" => "Gagal Menambahkan Data",
                ]);
            }
        }
    }


    public function updatebapo(Request $request)
    {
        $id = $request->id;
        $validator = Validator::make(request()->all(), [
            'nama' => 'required|unique:tbl_master_bahan_pokok,nama,' . $id,
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => "failed",
                "message" => $validator->errors()->first(),
            ]);
        } else {
            $store = $this->service->updatebapo($id, $request->all());
            if ($store == true) {
                return response()->json([
                    "status" => "success",
                    "messages" => "Berhasil memperbaharui Data",
                ]);
            } else {
                return response()->json([
                    "status" => "failed",
                    "messages" => "Gagal memperbaharui Data",
                ]);
            }
        }
    }
}

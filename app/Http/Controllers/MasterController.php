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

            ->addColumn('button', function ($row) {
                // PERBAIKAN: Kode untuk membuat HTML tombol ada di sini
                $editBtn = '<button onclick="editSatuan(' . $row->id . ')" class="p-2 text-blue-600 hover:text-blue-800 transition-colors"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">...</svg></button>';
                $deleteBtn = '<button onclick="deleteSatuan(' . $row->id . ')" class="p-2 text-red-600 hover:text-red-800 transition-colors"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">...</svg></button>';
                return $editBtn . $deleteBtn;
            })
            ->addColumn('button', function ($row) {
                // PERBAIKAN: Tombol Edit sekarang menggunakan @click dari Alpine.js
                // untuk mengambil data dan membuka modal secara langsung.
                $editAction = "
                        editData = await (await fetch(`/master/data/show?type=satuan&id={$row->id}`)).json(); 
                        editModalOpen = true;
                    ";

                $editBtn = '<button @click="' . $editAction . '" class="p-2 text-yellow-500 hover:text-yellow-700 transition-colors" title="Edit">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.536L16.732 3.732z"></path></svg>
                                </button>';

                // Tombol Hapus dengan styling Tailwind dan ikon SVG
                $deleteBtn = '<button onclick="deleteSatuan(' . $row->id . ')" class="p-2 text-red-500 hover:text-red-700 transition-colors" title="Hapus">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                 </button>';

                // Gabungkan kedua tombol dalam satu div
                return '<div class="flex items-center">' . $editBtn . $deleteBtn . '</div>';
            })
            ->addColumn('buttonkomoditi', function ($row) {
                // PERBAIKAN: Tombol Edit sekarang menggunakan @click dari Alpine.js
                // untuk mengambil data dan membuka modal secara langsung.
                $editAction = "
                        editData = await (await fetch(`/master/data/show?type=komoditi&id={$row->id}`)).json(); 
                        editModalOpen = true;
                    ";

                $editBtn = '<button @click="' . $editAction . '" class="p-2 text-yellow-500 hover:text-yellow-700 transition-colors" title="Edit">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.536L16.732 3.732z"></path></svg>
                                </button>';

                // Tombol Hapus dengan styling Tailwind dan ikon SVG
                $deleteBtn = '<button onclick="deleteKomoditi(' . $row->id . ')" class="p-2 text-red-500 hover:text-red-700 transition-colors" title="Hapus">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                 </button>';

                // Gabungkan kedua tombol dalam satu div
                return '<div class="flex items-center">' . $editBtn . $deleteBtn . '</div>';
            })
            ->addColumn('buttonbapo', function ($row) {
                // PERBAIKAN: Tombol Edit sekarang menggunakan @click dari Alpine.js
                // untuk mengambil data dan membuka modal secara langsung.
                $editAction = "
                        editData = await (await fetch(`/master/data/show?type=bapo&id={$row->id}`)).json(); 
                        editModalOpen = true;
                    ";

                $editBtn = '<button @click="' . $editAction . '" class="p-2 text-yellow-500 hover:text-yellow-700 transition-colors" title="Edit">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.536L16.732 3.732z"></path></svg>
                                </button>';

                // Tombol Hapus dengan styling Tailwind dan ikon SVG
                $deleteBtn = '<button onclick="deleteBapo(' . $row->id . ')" class="p-2 text-red-500 hover:text-red-700 transition-colors" title="Hapus">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                 </button>';

                // Gabungkan kedua tombol dalam satu div
                return '<div class="flex items-center">' . $editBtn . $deleteBtn . '</div>';
            })
            ->rawColumns(['button', 'buttonbapo', 'buttonkomoditi'])
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

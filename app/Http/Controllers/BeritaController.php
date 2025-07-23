<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Berita;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Services\BeritaServices;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

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
        $data = $this->service->getDataBerita();


        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('foto', function ($row) {
                // Membuat kolom foto dengan tag <img>
                $url = asset('storage/' . $row->path);
                return '<img src="' . $url . '" border="0" width="100" class="img-fluid rounded" align="center" />';
            })
            ->editColumn('berita', function ($row) {
                // Memotong teks berita agar tidak terlalu panjang di tabel
                return Str::limit(strip_tags($row->berita), 50, '...');
            })
            ->editColumn('tanggal', function ($row) {
                // Memotong teks berita agar tidak terlalu panjang di tabel
                return Carbon::parse($row->post_at)->format('d-m-Y');
            })
            ->addColumn('button', function ($row) {
                // PERBAIKAN: Tombol Edit sekarang menggunakan @click dari Alpine.js
                // untuk mengambil data dan membuka modal secara langsung.
                $editAction = "
                        editData = await (await fetch(`/berita/show?id={$row->id}`)).json(); 
                        editModalOpen = true;
                    ";

                $editBtn = '<button @click="' . $editAction . '" class="p-2 text-yellow-500 hover:text-yellow-700 transition-colors" title="Edit">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.536L16.732 3.732z"></path></svg>
                                </button>';

                // Tombol Hapus dengan styling Tailwind dan ikon SVG
                $deleteBtn = '<button onclick="deleteBerita(' . $row->id . ')" class="p-2 text-red-500 hover:text-red-700 transition-colors" title="Hapus">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                 </button>';

                // Gabungkan kedua tombol dalam satu div
                return '<div class="flex items-center">' . $editBtn . $deleteBtn . '</div>';
            })
            ->rawColumns(['tanggal', 'foto', 'button']) // Memberitahu DataTables untuk tidak meng-escape HTML
            ->make(true);
    }

    public function show(Request $request)
    {
        $id = $request->id;
        $data = $this->service->getDataBerita($id);
        return response()->json(
            [
                'id' => $data->id,
                'judul' => $data->judul,
                'status' => $data->status,
                'post_at' => Carbon::parse($data->post_at)->format('Y-m-d'),
                'berita' => $data->berita,
                'path' => $data->path,
            ]
        );
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
        } else {
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
        } else {
            $store = $this->service->storeBerita($request);
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
        } else {
            $store = $this->service->updateBerita($id, $request->all());
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

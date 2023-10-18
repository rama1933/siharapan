<?php

namespace App\Services;

use App\Models\Berita;
use Illuminate\Http\Request;
use App\Repositories\BeritaRepository;

class BeritaServices
{
    public function __construct()
    {
    //
    }

    function getDataBerita($id = null)
    {
        if ($id === null) {
            $data = Berita::all();
        }
        else {
            $data = Berita::where('id', $id)->first();
        }
        return $data;
    }

    public static function storeBerita(Request $request)
    {
        $repo = new BeritaRepository();
        if ($request->hasFile('path')) {
            $store =
                Berita::create([
                "berita" => $request->berita,
                "judul" => $request->judul,
                "created_at" => now(),
                "updated_at" => now(),
                'path' => $repo->StoreFileBerita($request, $request->id),
                "post_at" => now()
            ]);
            return true;
        }
        else {
        # code...
        }


    }


    public static function updateBerita($id, array $data)
    {
        $find = Berita::find($id);
        $toward =
        [
            "berita" => $data['berita'],
            "judul" => $data['judul'],
            "created_at" => now(),
            "updated_at" => now(),
            "post_at" => now()
        ];
        $find->update($toward);
        return true;
    }

    public static function delete($id)
    {
        try {
            Berita::where('id', $id)->delete();
            return true;
        }
        catch (\Throwable $th) {
            return false;
        }
    }
}

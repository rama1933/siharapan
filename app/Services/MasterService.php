<?php

namespace App\Services;

use App\Models\Bapo;
use App\Models\Satuan;
use App\Models\Komoditi;

class MasterService
{
    public function __construct()
    {
        //
    }
    function getDataSatuan($id = null)
    {
        if ($id === null) {
            $data = Satuan::all();
        } else {
            $data =  Satuan::where('id', $id)->first();
        }
        return $data;
    }

    function getDataKomoditi($id = null)
    {
        if ($id === null) {
            $data = Komoditi::all();
        } else {
            $data =  Komoditi::where('id', $id)->first();
        }
        return $data;
    }

    function getDataBapo($id = null)
    {
        if ($id === null) {
            $data = Bapo::with('satuan')->with('komoditi')->get();
        } else {
            $data =  Bapo::where('id', $id)->first();
        }
        return $data;
    }

    public static function storeSatuan(array $data)
    {
        $store =
            Satuan::create([
                "nama" => $data['nama'],
                "created_at" => now(),
                "updated_at" => now()
            ]);
        return true;
    }


    public static function updateSatuan($id, array $data)
    {
        $find = Satuan::find($id);
        $toward =
            [
                "nama" => $data['nama'],
                "created_at" => now(),
                "updated_at" => now()
            ];
        $find->update($toward);
        return true;
    }

    public static function storeKomoditi(array $data)
    {
        $store =
            Komoditi::create([
                "nama" => $data['nama'],
                "created_at" => now(),
                "updated_at" => now()
            ]);
        return true;
    }


    public static function updateKomoditi($id, array $data)
    {
        $find = Komoditi::find($id);
        $toward =
            [
                "nama" => $data['nama'],
                "created_at" => now(),
                "updated_at" => now()
            ];
        $find->update($toward);
        return true;
    }

    public static function storeBapo(array $data)
    {
        $store =
            Bapo::create([
                "nama" => $data['nama'],
                "satuan_id" => $data['satuan_id'],
                "komoditi_id" => $data['komoditi_id'],
                "created_at" => now(),
                "updated_at" => now()
            ]);
        return true;
    }


    public static function updateBapo($id, array $data)
    {
        $find = Bapo::find($id);
        $toward =
            [
                "nama" => $data['nama'],
                "created_at" => now(),
                "updated_at" => now()
            ];
        $find->update($toward);
        return true;
    }

    public static function deleteDataSatuan($id)
    {
        try {
            Satuan::find($id)->delete();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public static function deleteDataKomoditi($id)
    {
        try {
            Komoditi::find($id)->delete();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public static function deleteDataBapo($id)
    {
        try {
            Bapo::find($id)->delete();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}

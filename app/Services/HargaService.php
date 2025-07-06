<?php

namespace App\Services;

use App\Models\HargaBjm;
use App\Models\HargaNegara;
use App\Models\HargaTanjung;
use App\Models\HargaKandangan;

class HargaService
{
    public function __construct()
    {
        //
    }

    function getDataHargaKandangan($id = null)
    {
        if ($id === null) {
            $data = HargaKandangan::orderBy('tanggal', 'desc')->get();
        } else {
            $data = HargaKandangan::where('id', $id)->first();
        }
        return $data;
    }

    function getDataHargaNegara($id = null)
    {
        if ($id === null) {
            $data = HargaNegara::all();
        } else {
            $data = HargaNegara::where('id', $id)->first();
        }
        return $data;
    }

    function getDataHargaTanjung($id = null)
    {
        if ($id === null) {
            $data = HargaTanjung::all();
        } else {
            $data = HargaTanjung::where('id', $id)->first();
        }
        return $data;
    }

    function getDataHargaBjm($id = null)
    {
        if ($id === null) {
            $data = HargaBjm::all();
        } else {
            $data = HargaBjm::where('id', $id)->first();
        }
        return $data;
    }

    public static function deleteDataHargaKandangan(array $data)
    {
        try {
            HargaKandangan::where('tanggal', $data['tanggal'])->delete();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public static function deleteDataHargaNegara(array $data)
    {
        try {
            HargaNegara::where('tanggal', $data['tanggal'])->delete();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public static function deleteDataHargaTanjung(array $data)
    {
        try {
            HargaTanjung::where('tanggal', $data['tanggal'])->delete();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public static function deleteDataHargaBjm(array $data)
    {
        try {
            HargaBjm::where('tanggal', $data['tanggal'])->delete();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}

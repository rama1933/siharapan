<?php

namespace App\Services;

use App\Models\Bapo;
use App\Models\HargaBjm;
use App\Models\HargaNegara;
use App\Models\HargaTanjung;
use App\Models\HargaKandangan;

class LandingService
{
    public function __construct()
    {
        //
    }
    function getAll()
    {
        $bapo_count = Bapo::count();
        $data = HargaKandangan::orderBy('tanggal', 'desc')->limit($bapo_count)->get();
        return $data;
    }

    function getHarga()
    {
        $bapo = Bapo::all();
        $bapo_count = Bapo::count();
        $data = HargaKandangan::orderBy('tanggal', 'desc')->limit($bapo_count)->get();
        return $data;
    }

    function filterData(array $data)
    {
        $bapo = Bapo::all();
        $bapo_count = Bapo::count();
        $harga = HargaKandangan::where('tanggal', $data['tanggal'])->orderBy('tanggal', 'desc')->limit($bapo_count)->get();
        $harga_negara = HargaNegara::where('tanggal', $data['tanggal'])->orderBy('tanggal', 'desc')->limit($bapo_count)->get();
        $harga_tanjung = HargaTanjung::where('tanggal', $data['tanggal'])->orderBy('tanggal', 'desc')->limit($bapo_count)->get();
        $harga_bjm = HargaBjm::orderBy('tanggal', 'desc')->limit($bapo_count)->get();
        // dd($harga_negara);

        $data = $bapo->map(function ($bapo, $key) {
            return [
                'id' => $bapo->id,
                'nama_bapo' => $bapo->nama,
                'satuan' => $bapo->satuan
            ];
        });

        $data_kandangan = $harga->map(function ($harga, $key) {
            return [
                'id' => $harga->id,
                'nama' => $harga->jenis,
                'harga_hari_ini_kandangan' => $harga->harga_hari_ini,
                'harga_kemarin_kandangan' => $harga->harga_kemarin,
                'perubahan_harga_kandangan' => $harga->perubahan_harga,
                'perubahan_harga_persen_kandangan' => $harga->perubahan_harga_persen,
                'komoditi' => $harga->nama,
                'satuan' => $harga->satuan,
                'tanggal_kandangan' => $harga->tanggal,
                'persedian' => $harga->persedian
            ];
        });

        $data_negara = $harga_negara->map(function ($harga, $key) {
            return [
                'id' => $harga->id,
                'nama_harga_negara' => $harga->jenis,
                'harga_hari_ini_negara' => $harga->harga_hari_ini,
                'harga_kemarin_negara' => $harga->harga_kemarin,
                'perubahan_harga_negara' => $harga->perubahan_harga,
                'perubahan_harga_persen_negara' => $harga->perubahan_harga_persen,
            ];
        });

        $data_tanjung = $harga_tanjung->map(function ($harga, $key) {
            return [
                'id' => $harga->id,
                'nama_harga_tanjung' => $harga->jenis,
                'harga_hari_ini_tanjung' => $harga->harga_hari_ini,
                'harga_kemarin_tanjung' => $harga->harga_kemarin,
                'perubahan_harga_tanjung' => $harga->perubahan_harga,
                'perubahan_harga_persen_tanjung' => $harga->perubahan_harga_persen,
            ];
        });

        $data_bjm = $harga_bjm->map(function ($harga, $key) {
            return [
                'id' => $harga->id,
                'nama_harga_bjm' => $harga->jenis,
                'harga_hari_ini_bjm' => $harga->harga_hari_ini,
                'harga_kemarin_bjm' => $harga->harga_kemarin,
                'perubahan_harga_bjm' => $harga->perubahan_harga,
                'perubahan_harga_persen_bjm' => $harga->perubahan_harga_persen,
            ];
        });

        $merged = collect($data_kandangan)->map(function ($value) use ($data, $data_negara, $data_tanjung, $data_bjm) {
            foreach ($data_bjm as $array_bjm) {
                foreach ($data as $array) {
                    if ($value["nama"] == $array["nama_bapo"] && $array_bjm["nama_harga_bjm"] == $array["nama_bapo"]) {
                        $value["harga_hari_ini_bjm"] = $array_bjm["harga_hari_ini_bjm"];
                        $value["harga_kemarin_bjm"] = $array_bjm["harga_kemarin_bjm"];
                        $value["perubahan_harga_bjm"] = $array_bjm["perubahan_harga_bjm"];
                        $value["perubahan_harga_persen_bjm"] = $array_bjm["perubahan_harga_persen_bjm"];
                        $value["komoditi"] = $value["komoditi"];
                    }
                }
            }
            foreach ($data_tanjung as $array_tanjung) {
                foreach ($data as $array) {
                    if ($value["nama"] == $array["nama_bapo"] && $array_tanjung["nama_harga_tanjung"] == $array["nama_bapo"]) {
                        $value["harga_hari_ini_tanjung"] = $array_tanjung["harga_hari_ini_tanjung"];
                        $value["harga_kemarin_tanjung"] = $array_tanjung["harga_kemarin_tanjung"];
                        $value["perubahan_harga_tanjung"] = $array_tanjung["perubahan_harga_tanjung"];
                        $value["perubahan_harga_persen_tanjung"] = $array_tanjung["perubahan_harga_persen_tanjung"];
                    }
                }
            }
            foreach ($data_negara as $array_negara) {
                foreach ($data as $array) {
                    if ($value["nama"] == $array["nama_bapo"] && $array_negara["nama_harga_negara"] == $array["nama_bapo"]) {
                        $value["harga_hari_ini_negara"] = $array_negara["harga_hari_ini_negara"];
                        $value["harga_kemarin_negara"] = $array_negara["harga_kemarin_negara"];
                        $value["perubahan_harga_negara"] = $array_negara["perubahan_harga_negara"];
                        $value["perubahan_harga_persen_negara"] = $array_negara["perubahan_harga_persen_negara"];
                    }
                }
            }

            foreach ($data as $array) {
                if ($value["nama"] == $array["nama_bapo"]) {
                    $value["harga_hari_ini_kandangan"] = $value["harga_hari_ini_kandangan"];
                    $value["harga_kemarin_kandangan"] = $value["harga_kemarin_kandangan"];
                    $value["perubahan_harga_kandangan"] = $value["perubahan_harga_kandangan"];
                    $value["perubahan_harga_persen_kandangan"] = $value["perubahan_harga_persen_kandangan"];
                    $value["satuan"] = $value["satuan"];
                    $value["persedian"] = $value["persedian"];
                }
            }

            return $value;
        });

        $arr = $merged->toArray();
        $collect = collect($arr);
        $data = $collect->groupBy('komoditi');

        return $data;
    }
}

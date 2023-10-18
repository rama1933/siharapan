<?php

namespace Database\Seeders;

use App\Models\Satuan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class SatuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $json = File::get("database/data/satuan.json");
        $data = json_decode($json, true);
        foreach ($data as $data) {
            Satuan::create([
                'nama' => $data['nama'],
            ]);
        }
    }
}

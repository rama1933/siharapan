<?php

namespace Database\Seeders;

use App\Models\Bapo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class BapoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $json = File::get("database/data/bapo.json");
        $data = json_decode($json, true);
        foreach ($data as $data) {
            Bapo::create([
                'nama' => $data['nama'],
                'satuan_id' => $data['satuan_id'],
                'komoditi_id' => $data['komoditi_id'],
            ]);
        }
    }
}

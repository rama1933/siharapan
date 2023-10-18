<?php

namespace Database\Seeders;

use App\Models\Komoditi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class KomoditiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $json = File::get("database/data/komoditi.json");
        $data = json_decode($json, true);
        foreach ($data as $data) {
            Komoditi::create([
                'nama' => $data['nama'],
            ]);
        }
    }
}

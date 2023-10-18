<?php

namespace App\Imports;

use App\Models\HargaKandangan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
// use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class HargaKandanganImport implements ToModel, WithCalculatedFormulas
{

    protected $currentRow = 0;

    protected $tanggal;
    function __construct($tanggal)
    {
        $this->tanggal = $tanggal;
    }
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    // public function startRow(): int
    // {
    //     return 8;
    // }

    // public function sheets(): array
    // {
    //     return [
    //         1 => $this,
    //     ];
    // }

    public function model(array $row)
    {
        $this->currentRow++;
        if ($this->currentRow >= 8 && $this->currentRow <= 18) {
            return new HargaKandangan([
                'bapo_id' => $row[0],
                'nama' => $row[1],
                'jenis' => $row[2],
                'satuan' => $row[3],
                'harga_terendah' => $row[4],
                'persedian' => $row[5],
                'tanggal' => $this->tanggal
            ]);
        }
    }
}

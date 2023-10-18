<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bapo extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'tbl_master_bahan_pokok';
    protected $guarded = [''];

    public function satuan()
    {
        return $this->hasOne(Satuan::class, 'id', 'satuan_id');
    }

    public function komoditi()
    {
        return $this->hasOne(Komoditi::class, 'id', 'komoditi_id');
    }
}

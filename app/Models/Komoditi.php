<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komoditi extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'tbl_master_komoditi';
    protected $guarded = [''];
}

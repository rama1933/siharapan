<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblMasterHarga extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_master_harga', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bapo_id')->nullable();
            $table->string('nama', 256)->nullable();
            $table->string('jenis', 256)->nullable();
            $table->string('satuan', 256)->nullable();
            $table->date('tanggal')->nullable();
            $table->decimal('harga_terendah', 19, 2)->nullable();
            // $table->decimal('harga_tertinggi', 19, 2)->nullable();
            // $table->decimal('harga_kemarin', 19, 2)->nullable();
            // $table->decimal('harga_hari_ini', 19, 2)->nullable();
            // $table->decimal('perubahan_harga_persen', 19, 2)->nullable();
            // $table->decimal('perubahan_harga', 19, 2)->nullable();
            $table->string('persedian', 256)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_master_harga');
    }
}

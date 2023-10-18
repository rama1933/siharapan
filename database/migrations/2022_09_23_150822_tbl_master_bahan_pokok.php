<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_master_bahan_pokok', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('satuan_id')->nullable();
            $table->unsignedBigInteger('komoditi_id')->nullable();
            $table->string('nama', 256);
            $table->foreign('satuan_id')->references('id')->on('tbl_master_satuan')->onDelete('cascade');
            $table->foreign('komoditi_id')->references('id')->on('tbl_master_komoditi')->onDelete('cascade');
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
        Schema::dropIfExists('tbl_master_bahan_pokok');
    }
};

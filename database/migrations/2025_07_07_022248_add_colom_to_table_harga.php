<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_master_harga', function (Blueprint $table) {
            $table->decimal('harga_grosir', 19, 2)->nullable();
            $table->decimal('harga_kios', 19, 2)->nullable();
            $table->decimal('ketersediaan', 19, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_master_harga', function (Blueprint $table) {
            //
        });
    }
};

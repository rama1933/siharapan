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
        Schema::create('tbl_master_berita', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['Publish', 'Unpublish'])->default('Unpublish');
            $table->text('berita')->nullable();
            $table->text('judul')->nullable();
            $table->dateTime('post_at');
            $table->string('path')->nullable();
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
        Schema::dropIfExists('tbl_master_berita');
    }
};

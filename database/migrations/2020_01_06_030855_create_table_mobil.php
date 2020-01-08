<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMobil extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_mobil', function (Blueprint $table) {
            $table->integer('id_mobil')->primary();
            $table->string('nama_mobil', 100);
            $table->string('tahun', 50);
            $table->String('kapasitas',50);
            $table->string('transmition',50);
            $table->string('harga',50);
            $table->integer('id_merk');
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
        Schema::dropIfExists('table_mobil');
    }
}


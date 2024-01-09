<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('proses', function (Blueprint $table) {
            $table->id();
            $table->string('nama_proses');
            $table->timestamps();
        });

        DB::table('proses')->insert([
            ['nama_proses' => 'Antrian Bordir'],
            ['nama_proses' => 'Antrian Cetak'],
            ['nama_proses' => 'Pembuatan Film Bordir'],
            ['nama_proses' => 'Proses Bordir'],
            ['nama_proses' => 'Proses Cetak'],
            ['nama_proses' => 'Penjahitan'],
            ['nama_proses' => 'Packing'],
            ['nama_proses' => 'Selesai'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proses');
    }
};

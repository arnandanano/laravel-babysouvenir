<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('progres_produksis', function (Blueprint $table) {
            $table->id();
            $table->integer('no_nota');
            $table->string('nama_pemesan');
            $table->unsignedBigInteger('produk_id');
            $table->integer('qty');
            $table->date('tgl_acara');
            $table->unsignedBigInteger('proses_id');
            $table->timestamps();

            $table->foreign('produk_id')->references('id')->on('produks')->onDelete('cascade');
            $table->foreign('proses_id')->references('id')->on('proses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('progres_produksis');
    }
};

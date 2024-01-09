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
        Schema::create('packings', function (Blueprint $table) {
            $table->id();
            $table->string('nama_packing');
            $table->timestamps();
        });

        DB::table('packings')->insert([
            ['nama_packing' => '3in1 Card'],
            ['nama_packing' => 'Pita Premium'],
            ['nama_packing' => 'Plastik, Pita Serut'],
            ['nama_packing' => 'Plastik, Pita Serut, Card'],
            ['nama_packing' => 'Tile, Pita Satin, Card'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packings');
    }
};

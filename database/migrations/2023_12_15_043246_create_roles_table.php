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
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('nama_role')->unique;
            $table->timestamps();
        });

        DB::table('roles')->insert([
            ['nama_role' => 'Superuser'],
            ['nama_role' => 'Desain'],
            ['nama_role' => 'Admin Produksi'],
            ['nama_role' => 'Owner'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};

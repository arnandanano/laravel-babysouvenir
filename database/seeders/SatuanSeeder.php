<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Satuan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SatuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Satuan::create([
            'nama_satuan'   => 'Pcs',
            'slug'          => 'pcs',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        Satuan::create([
            'nama_satuan'   => 'Meter',
            'slug'          => 'meter',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        Satuan::create([
            'nama_satuan'   => 'Roll',
            'slug'          => 'roll',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

    }
}

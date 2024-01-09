<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('users')->insert([
        //     'name'      => 'adminarnanda',
        //     'email'     => 'adminarnanda@gmail.com',
        //     'password'  => Hash::make('123456'),
        //     'role_id'   => '1',
        //     'slug'      => 'adminarnanda',
        // ]);

        User::create([
            'name'      => 'Admin Arnanda',
            'email'     => 'adminarnanda@gmail.com',
            'password'  => Hash::make('123456'),
            'role_id'   => '1',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'slug'      => 'admin-arnanda',
        ]);

        User::create([
            'name'      => 'Desain Nano',
            'email'     => 'desainnano@gmail.com',
            'password'  => Hash::make('123456'),
            'role_id'   => '2',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'slug'      => 'desain-nano',
        ]);

        User::create([
            'name'      => 'AdminProduksi Laksana',
            'email'     => 'admprod.laksana@gmail.com',
            'password'  => Hash::make('123456'),
            'role_id'   => '3',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'slug'      => 'adminproduksi-laksana',
        ]);

        User::create([
            'name'      => 'Owner Alamsyah',
            'email'     => 'owneralamsyah@gmail.com',
            'password'  => Hash::make('123456'),
            'role_id'   => '4',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'slug'      => 'owner-alamsyah',
        ]);
    }
}

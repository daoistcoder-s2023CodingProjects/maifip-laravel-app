<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        DB::table('admin')->insert([
            'id' => Str::uuid(),
            'name' => 'admin',
            'email' => 'admin@maifip.test',
            'password' => Hash::make('maifip@123'),
            'token' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

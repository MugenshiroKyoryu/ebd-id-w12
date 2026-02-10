<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
  public function run(): void
  {
    DB::table('users')->updateOrInsert(
      ['email' => 'admin@example.com'],
      [
        'name' => 'Admin',
        'password' => Hash::make('password'),
        'phone' => '0800000000',
        'address' => 'Bangkok',
        'updated_at' => now(),
        'created_at' => now(),
      ]
    );

    DB::table('users')->updateOrInsert(
      ['email' => 'customer@example.com'],
      [
        'name' => 'Customer',
        'password' => Hash::make('password'),
        'phone' => '0811111111',
        'address' => 'Chiang Mai',
        'updated_at' => now(),
        'created_at' => now(),
      ]
    );
  }
}

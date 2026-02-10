<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
  public function run(): void
  {
    DB::table('categories')->insert([
      ['name' => 'Electronics', 'description' => 'Electronic items', 'created_at' => now(), 'updated_at' => now()],
      ['name' => 'Books', 'description' => 'Books & magazines', 'created_at' => now(), 'updated_at' => now()],
      ['name' => 'Clothing', 'description' => 'Fashion', 'created_at' => now(), 'updated_at' => now()],
    ]);
  }
}

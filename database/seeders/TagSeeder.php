<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tag')->insert([
            [ 'tag_name' => 'Technology', 'created_at' => now(), 'updated_at' => now() ],
            [ 'tag_name' => 'Education', 'created_at' => now(), 'updated_at' => now() ],
            [ 'tag_name' => 'Sport', 'created_at' => now(), 'updated_at' => now() ],
            [ 'tag_name' => 'Entertainment', 'created_at' => now(), 'updated_at' => now() ],
            [ 'tag_name' => 'Health', 'created_at' => now(), 'updated_at' => now() ],
        ]);
    }
}
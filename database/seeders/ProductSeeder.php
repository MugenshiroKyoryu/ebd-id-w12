<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
  public function run(): void
  {
    $cats = DB::table('categories')->pluck('id','name');

    DB::table('products')->insert([
      [
        'category_id' => $cats['Electronics'],
        'name' => 'Wireless Mouse',
        'description' => '2.4G wireless mouse',
        'price' => 299.00,
        'stock' => 50,
        'image' => 'https://img.th.my-best.com/product_images/ef43bccdb9771926a20b79b174955507.png?ixlib=rails-4.3.1&q=70&lossless=0&w=800&h=800&fit=clip&s=a0b23b20fcd5fe72de72883e57a823e6',
        'created_at' => now(), 'updated_at' => now()
      ],
      [
        'category_id' => $cats['Books'],
        'name' => 'Laravel Handbook',
        'description' => 'Learn Laravel from scratch',
        'price' => 450.00,
        'stock' => 30,
        'image' => 'https://files.selar.co/product-images/2024/products/adegoke-akintoye1/laravel-guide-selar.co-6639f9c4c7ef7.webp',
        'created_at' => now(), 'updated_at' => now()
      ],
    ]);
  }
}

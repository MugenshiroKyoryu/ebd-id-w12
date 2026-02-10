<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
  public function run(): void
  {
    $userId = DB::table('users')->where('email', 'customer@example.com')->value('id');
    $p1 = DB::table('products')->where('name', 'Wireless Mouse')->first();
    $p2 = DB::table('products')->where('name', 'Laravel Handbook')->first();

    DB::beginTransaction();

    $orderId = DB::table('orders')->insertGetId([
      'user_id' => $userId,
      'total_price' => ($p1->price * 2) + ($p2->price * 1),
      'status' => 'PENDING',
      'payment_method' => 'TRANSFER',
      'created_at' => now(),
      'updated_at' => now(),
    ]);

    DB::table('order_items')->insert([
      [
        'order_id' => $orderId,
        'product_id' => $p1->id,
        'quantity' => 2,
        'price' => $p1->price,
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        'order_id' => $orderId,
        'product_id' => $p2->id,
        'quantity' => 1,
        'price' => $p2->price,
        'created_at' => now(),
        'updated_at' => now(),
      ],
    ]);

    DB::table('payments')->insert([
      'order_id' => $orderId,
      'amount' => ($p1->price * 2) + ($p2->price * 1),
      'payment_type' => 'TRANSFER',
      'payment_time' => null,
      'slip_image' => null,
      'created_at' => now(),
      'updated_at' => now(),
    ]);

    DB::commit();
  }
}

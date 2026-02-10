<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  public function up(): void {
    Schema::create('payments', function (Blueprint $table) {
      $table->id();
      $table->foreignId('order_id')->unique()->constrained('orders')->cascadeOnUpdate()->cascadeOnDelete(); // 1:1
      $table->decimal('amount', 10, 2);
      $table->string('payment_type'); // TRANSFER, CARD, COD
      $table->timestamp('payment_time')->nullable();
      $table->string('slip_image')->nullable();
      $table->timestamps();
    });
  }

  public function down(): void {
    Schema::dropIfExists('payments');
  }
};

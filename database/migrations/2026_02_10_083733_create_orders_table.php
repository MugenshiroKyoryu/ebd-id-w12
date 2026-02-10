<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  public function up(): void {
    Schema::create('orders', function (Blueprint $table) {
      $table->id();
      $table->foreignId('user_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
      $table->decimal('total_price', 10, 2)->default(0);
      $table->string('status')->default('PENDING'); // PENDING, PAID, SHIPPED, CANCELLED
      $table->string('payment_method')->nullable(); // COD, TRANSFER, CARD
      $table->timestamp('created_at')->useCurrent();
      $table->timestamp('updated_at')->nullable();

      $table->index(['user_id']);
    });
  }

  public function down(): void {
    Schema::dropIfExists('orders');
  }
};

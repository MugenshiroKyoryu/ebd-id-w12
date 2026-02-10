<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  public function up(): void {
    Schema::table('users', function (Blueprint $table) {
      // ถ้าใช้ Laravel 10/11 users จะมี name/email/password แล้ว
      $table->string('phone')->nullable()->after('password');
      $table->text('address')->nullable()->after('phone');
    });
  }

  public function down(): void {
    Schema::table('users', function (Blueprint $table) {
      $table->dropColumn(['phone', 'address']);
    });
  }
};

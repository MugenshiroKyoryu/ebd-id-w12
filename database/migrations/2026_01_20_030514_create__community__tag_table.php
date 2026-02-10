<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('community_tag', function (Blueprint $table) {
    $table->id();
    $table->foreignId('community_id')
          ->constrained('community')
          ->cascadeOnDelete();

    $table->foreignId('tag_id')
          ->constrained('tag')
          ->cascadeOnDelete();

    $table->timestamps();
});

    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('communities_tag');
    }
};

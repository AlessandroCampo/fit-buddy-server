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
        Schema::create('food', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index();
            $table->decimal('calories', 8, 2);
            $table->decimal('proteins', 8, 2);
            $table->decimal('carbs', 8, 2);
            $table->decimal('fats', 8, 2);
            $table->string('picture_url')->nullable();
            $table->string('barcode')->nullable()->unique();
            $table->string('brand')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food');
    }
};

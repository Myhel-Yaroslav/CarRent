<?php
// database/migrations/xxxx_xx_xx_add_image_to_car_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('car', function (Blueprint $table) {
            $table->string('image')->nullable()->after('year'); // Додаємо шлях до картинки
        });
    }

    public function down(): void
    {
        Schema::table('car', function (Blueprint $table) {
            $table->dropColumn('image');
        });
    }
};
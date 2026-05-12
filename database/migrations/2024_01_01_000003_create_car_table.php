<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Перевіряємо, чи таблиця вже існує
        if (!Schema::hasTable('car')) {
            Schema::create('car', function (Blueprint $table) {
                // Використовуйте структуру, яка відповідає вашій базі
                $table->string('NumberPlate')->primary(); 
                $table->integer('ModelID');
                $table->integer('Year');
                $table->decimal('PricePerDay', 10, 2);
                $table->string('Status', 30);
                $table->string('Conditionn', 50);
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        // Schema::dropIfExists('car'); // Краще закоментувати, щоб випадково не видалити дані
    }
};
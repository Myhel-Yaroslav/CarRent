<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('reservation')) {
            Schema::table('reservation', function (Blueprint $table) {
                // Додаємо user_id, якщо його немає, та зв'язуємо з users.id
                if (!Schema::hasColumn('reservation', 'user_id')) {
                    $table->unsignedBigInteger('user_id')->nullable()->after('ReservationID');
                    $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                }

                // Робимо ClientID необов'язковим, оскільки тепер переходимо на user_id
                if (Schema::hasColumn('reservation', 'ClientID')) {
                    $table->integer('ClientID')->nullable()->change();
                }
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('reservation')) {
            Schema::table('reservation', function (Blueprint $table) {
                if (Schema::hasColumn('reservation', 'user_id')) {
                    $table->dropForeign(['user_id']);
                    $table->dropColumn('user_id');
                }
            });
        }
    }
};
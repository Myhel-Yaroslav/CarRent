<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Додаємо нові поля з таблиці Client
            if (!Schema::hasColumn('users', 'FirstName')) {
                $table->string('FirstName')->nullable()->after('password');
                $table->string('LastName')->nullable()->after('FirstName');
                $table->string('Phone')->nullable()->after('LastName');
                $table->string('PassportNumber')->nullable()->after('Phone');
            }
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['FirstName', 'LastName', 'Phone', 'PassportNumber']);
        });
    }
};
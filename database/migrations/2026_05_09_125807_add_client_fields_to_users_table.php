<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('FirstName')->nullable();
            $table->string('LastName')->nullable();
            $table->string('Phone', 20)->nullable();
            $table->string('PassportNumber', 20)->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['FirstName', 'LastName', 'Phone', 'PassportNumber']);
        });
    }
};
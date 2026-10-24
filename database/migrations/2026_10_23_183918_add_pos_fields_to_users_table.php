<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Adds the POS-specific columns shown on the User Accounts page
 * (username, role, status, last_login) to Laravel's default users table.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username', 50)->unique()->after('name');
            $table->string('role', 50)->default('Cashier')->after('password');
            $table->enum('status', ['Active', 'Suspended'])->default('Active')->after('role');
            $table->dateTime('last_login')->nullable()->after('status');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropUnique(['username']);
            $table->dropColumn(['username', 'role', 'status', 'last_login']);
        });
    }
};

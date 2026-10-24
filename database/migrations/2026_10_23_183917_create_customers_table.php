<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Customers table for SariPOS. Its columns match the keys of the static
 * array in CustomerController, so a later TFA can switch the page from the
 * array to this table without changing the Blade view.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('customer_code', 20)->unique();
            $table->string('name', 100);
            $table->string('email', 150)->unique();
            $table->string('phone', 20)->nullable();
            $table->string('city', 80)->nullable();
            $table->unsignedInteger('loyalty_points')->default(0);
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
            $table->date('joined_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};

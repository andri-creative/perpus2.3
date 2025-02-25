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
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('password')->nullable();
            $table->string('phone')->nullable();
            $table->string('position')->nullable();
            $table->text('bio')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active')->nullable();
            $table->string('photo')->nullable();
            $table->rememberToken()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

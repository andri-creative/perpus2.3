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
        Schema::create('history', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('judul_books');
            $table->string('isbn_books');
            $table->string('phone_borrow');
            $table->string('category');
            $table->string('status');
            $table->string('name_borrow');
            $table->string('class_position');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history');
    }
};

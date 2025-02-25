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
        Schema::create('books', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('isbn_books');
            $table->string('judul_books');
            $table->string('autor_books');
            $table->year('year_books');
            $table->string('publisher_books');
            $table->string('number_books');
            $table->string('id_category');
            $table->string('id_rack');
            $table->string('name_rack')->nullable();
            $table->timestamps();

            $table->foreign('id_category')->references('id')->on('category')->onDelete('cascade');
            $table->foreign('id_rack')->references('id')->on('rack')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};

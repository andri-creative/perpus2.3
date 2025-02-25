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
            $table->uuid('id')->primary();
            $table->string('isbn_books')->nullable()->unique();
            $table->string('judul_books')->nullable();
            $table->string('autor_books')->nullable();
            $table->year('year_books')->nullable();
            $table->string('publisher_books')->nullable();
            $table->string('number_books')->nullable();
            $table->uuid('id_category')->nullable();
            $table->uuid('id_rack')->nullable();
            $table->string('name_rack')->nullable();
            $table->string('gambar')->nullable();
            $table->text('description')->nullable();
            $table->string('no_klasifikasi')->nullable();
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

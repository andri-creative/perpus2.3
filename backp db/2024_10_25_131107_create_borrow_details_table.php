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
        Schema::create('borrow_details', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('borrow_id');
            $table->string('book_id');
            $table->integer('counter');
            $table->timestamps();

            $table->foreign('borrow_id')->references('id')->on('borrow')->onDelete('cascade');
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrow_details');
    }
};
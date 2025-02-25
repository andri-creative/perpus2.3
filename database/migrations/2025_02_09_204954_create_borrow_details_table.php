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
            $table->uuid('id')->primary();
            $table->uuid('borrow_id')->nullable();
            $table->uuid('book_id')->nullable();
            $table->integer('counter')->nullable();
            $table->string('status')->default('Dipinjam')->nullable();
            $table->string('book_identity')->nullable();
            $table->uuid('borrowed_by')->nullable();
            $table->uuid('returned_by')->nullable();
            $table->dateTime('borrow_date')->nullable();
            $table->dateTime('return_date')->nullable();
            $table->enum('keterlambatan', ['tepat_waktu', 'terlambat'])->nullable();
            $table->timestamps();

            $table->foreign('borrow_id')->references('id')->on('borrow')->onDelete('cascade');
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
            $table->foreign('borrowed_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('returned_by')->references('id')->on('users')->onDelete('set null');
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

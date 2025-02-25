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
        Schema::create('pengunjung', function (Blueprint $table) {
            $table->uuid('id')->primary(); // Change to UUID
            $table->string('first_name')->nullable(); // Make nullable if needed
            $table->string('day')->nullable(); // Make nullable if needed
            $table->dateTime('date_time')->nullable(); // Make nullable if needed
            $table->string('kelas')->nullable(); // Make nullable if needed
            $table->text('keperluan')->nullable(); // Make nullable if needed
            $table->string('status')->default('masih di ruang')->nullable(); // Make nullable if needed
            $table->integer('durasi')->nullable(); // Already nullable
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengunjung');
    }
};

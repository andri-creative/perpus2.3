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
        Schema::create('sub', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('code_sub')->nullable();
            $table->uuid('rack_id')->nullable();
            $table->foreign('rack_id')->references('id')->on('rack')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub');
    }
};

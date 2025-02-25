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
            $table->string('id')->primary();
            $table->string('code_sub');
            $table->foreignId('rack_id')->nullable()->constrained()->onDelete('set null');
            $table->timestamps();

            $table->foreign('id_rack')->references('id')->on('rack')->onDelete('cascade');
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
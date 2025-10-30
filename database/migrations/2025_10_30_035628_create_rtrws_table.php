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
        Schema::create('rtrw', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('nama');
            $table->text('deskripsi')->nullable();
            $table->foreignId('wilayah_id')->constrained('wilayah')->onDelete('cascade');
            $table->foreignId('periode_id')->constrained('periode')->onDelete('cascade');
            $table->foreignId('dasar_hukum_id')->constrained('dasar_hukum')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rtrw');
    }
};

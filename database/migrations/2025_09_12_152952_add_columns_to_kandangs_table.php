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
        Schema::table('kandangs', function (Blueprint $table) {
            $table->string('nama_kandang');
            $table->enum('jenis_kandang', ['panggung', 'koloni', 'individu']);
            $table->unsignedInteger('kapasitas')->default(0);
            $table->text('lokasi')->nullable();
            $table->enum('kondisi', ['sehat', 'nyaman', 'perlu_perbaikan'])->default('nyaman');
            $table->unsignedInteger('jumlah_penghuni')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kandangs', function (Blueprint $table) {
            $table->dropColumn(['nama_kandang', 'jenis_kandang', 'kapasitas', 'lokasi', 'kondisi', 'jumlah_penghuni']);
        });
    }
};

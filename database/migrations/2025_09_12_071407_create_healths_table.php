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
        Schema::create('healths', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_kambing')->constrained('goats')->cascadeOnDelete();
            $table->date('tanggal_periksa')->nullable();
            $table->string('dokter_hewan')->nullable();
            $table->text('gejala')->nullable();
            $table->text('diagnosa')->nullable();
            $table->text('tindakan')->nullable();
            $table->text('vaksinasi')->nullable();
            $table->date('tanggal_vaksin')->nullable();
            $table->text('obat_cacing')->nullable();
            $table->date('tanggal_obat')->nullable();
            $table->enum('status_kondisi', ['sehat', 'sakit', 'karantina', 'bunting', 'laktasi'])->default('sehat');
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('healths');
    }
};

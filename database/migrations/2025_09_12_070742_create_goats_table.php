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
        Schema::create('goats', function (Blueprint $table) {
            $table->id();
            $table->string('kode_kambing')->unique();
            $table->string('nama_kambing');
            $table->enum('jenis', ['pedaging', 'perah']);
            $table->string('ras');
            $table->enum('jenis_kelamin', ['jantan', 'betina']);
            $table->date('tanggal_lahir')->nullable();
            $table->unsignedInteger('umur_bulan')->nullable();
            $table->decimal('berat_badan', 8, 2)->nullable();
            $table->enum('status_kondisi', ['sehat', 'sakit', 'bunting', 'laktasi', 'karantina', 'dijual'])->default('sehat');
            $table->string('foto_path')->nullable();
            $table->text('catatan')->nullable();
            $table->foreignId('kandang_id')->nullable()->constrained('kandangs')->nullOnDelete();
            $table->string('generasi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('goats');
    }
};

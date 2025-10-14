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
        Schema::create('reproductions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_kambing_betina')->constrained('goats')->cascadeOnDelete();
            $table->foreignId('id_kambing_jantan')->nullable()->constrained('goats')->nullOnDelete();
            $table->date('tanggal_kawin')->nullable();
            $table->enum('metode', ['alami', 'IB'])->nullable();
            $table->date('perkiraan_melahirkan')->nullable();
            $table->enum('status_reproduksi', ['belum_kawin', 'bunting', 'melahirkan', 'menyusui'])->default('belum_kawin');
            $table->unsignedInteger('jumlah_anak')->nullable();
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reproductions');
    }
};

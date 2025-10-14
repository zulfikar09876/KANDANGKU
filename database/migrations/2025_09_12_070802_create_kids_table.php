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
        Schema::create('kids', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_induk')->constrained('goats')->cascadeOnDelete();
            $table->string('nama_anak');
            $table->date('tanggal_lahir')->nullable();
            $table->enum('jenis_kelamin', ['jantan', 'betina']);
            $table->decimal('berat_lahir', 8, 2)->nullable();
            $table->boolean('kolostrum_terpenuhi')->default(false);
            $table->date('tanggal_sapih')->nullable();
            $table->string('pakan_tambahan')->nullable();
            $table->enum('status_kesehatan', ['sehat', 'sakit', 'karantina'])->default('sehat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kids');
    }
};

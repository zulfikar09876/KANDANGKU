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
        Schema::create('fattenings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_kambing')->constrained('goats')->cascadeOnDelete();
            $table->decimal('berat_awal', 8, 2)->nullable();
            $table->decimal('berat_akhir', 8, 2)->nullable();
            $table->date('periode_mulai')->nullable();
            $table->date('periode_selesai')->nullable();
            $table->string('pakan_fokus')->nullable();
            $table->text('hasil_penggemukan')->nullable();
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fattenings');
    }
};

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
        Schema::create('plannings', function (Blueprint $table) {
            $table->id();
            $table->enum('tujuan_usaha', ['pedaging', 'perah', 'bibit', 'penggemukan', 'campuran']);
            $table->text('target_pasar');
            $table->decimal('modal_awal', 14, 2)->default(0);
            $table->decimal('estimasi_biaya_operasional', 14, 2)->default(0);
            $table->decimal('estimasi_keuntungan', 14, 2)->default(0);
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plannings');
    }
};

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
        Schema::create('marketings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_kambing')->nullable()->constrained('goats')->nullOnDelete();
            $table->enum('produk', ['kambing_aqiqah', 'kambing_kurban', 'susu', 'pupuk', 'bibit']);
            $table->decimal('harga', 14, 2)->nullable();
            $table->enum('status', ['tersedia', 'terjual', 'dipromosikan', 'direservasi'])->default('tersedia');
            $table->date('tanggal_jual')->nullable();
            $table->string('pembeli')->nullable();
            $table->string('kontak_pembeli')->nullable();
            $table->text('testimoni')->nullable();
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marketings');
    }
};

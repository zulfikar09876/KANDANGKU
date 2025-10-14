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
        Schema::create('feeds', function (Blueprint $table) {
            $table->id();
            $table->enum('jenis_pakan', ['hijauan', 'konsentrat', 'mineral', 'silase', 'fermentasi']);
            $table->string('nama_pakan');
            $table->decimal('jumlah_stok', 10, 2)->default(0);
            $table->enum('satuan', ['kg', 'liter', 'ikat']);
            $table->dateTime('jadwal_pemberian')->nullable();
            $table->foreignId('pemberi_pakan_id')->nullable()->constrained('users')->nullOnDelete();
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feeds');
    }
};

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
        Schema::create('record_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_kambing')->nullable()->constrained('goats')->nullOnDelete();
            $table->date('tanggal');
            $table->enum('jenis_catatan', ['kesehatan', 'pakan', 'reproduksi', 'penjualan', 'umum']);
            $table->text('deskripsi')->nullable();
            $table->foreignId('user_input_id')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('record_logs');
    }
};

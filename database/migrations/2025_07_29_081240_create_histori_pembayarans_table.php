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
        Schema::create('histori_pembayarans', function (Blueprint $table) {
            $table->id('histori_pembayaran_id');
            $table->foreignId('user_id')->constrained('users', 'id')->onDelete('cascade');
            $table->foreignId('order_id')->constrained('orders', 'order_id')->onDelete('cascade');
            $table->foreignId('metode_pembayaran_id')->constrained('metode_pembayarans', 'metode_pembayaran_id')->onDelete('cascade');
            $table->decimal('jumlah', 10, 2);
            $table->enum('status', ['berhasil', 'gagal', 'pending'])->default('pending');
            $table->string('tanggal_pembayaran');
            $table->string('bukti_pembayaran')->nullable(); // Path to the uploaded payment receipt
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('histori_pembayarans');
    }
};

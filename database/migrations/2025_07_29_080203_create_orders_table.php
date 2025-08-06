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
        Schema::create('orders', function (Blueprint $table) {
            $table->id('order_id');
            $table->foreignId('user_id')->constrained('users', 'id')->onDelete('cascade');
            $table->foreignId('alamat_pengiriman_id')->constrained('alamat_pengirimans', 'alamat_pengiriman_id')->onDelete('cascade');
            $table->foreignId('metode_pengiriman_id')->constrained('metode_pengirimans', 'metode_pengiriman_id')->onDelete('cascade');
            $table->foreignId('metode_pembayaran_id')->constrained('metode_pembayarans', 'metode_pembayaran_id')->onDelete('cascade');
            $table->foreignId('promo_id')->nullable()->constrained('promos', 'promo_id')->onDelete('set null');
            $table->string('nomor_order')->unique();
            $table->dateTime('tanggal_order');
            $table->decimal('subtotal', 10, 2);
            $table->decimal('diskon', 10, 2)->default(0);
            $table->decimal('biaya_pengiriman', 10, 2)->default(0);
            $table->decimal('total_bayar', 10, 2);
            $table->enum('status_pembayaran', ['belum_bayar', 'sudah_bayar'])->default('belum_bayar');
            $table->enum('status_pesanan', ['pending', 'diproses', 'dikirim', 'selesai', 'dibatalkan'])->default('pending');
            $table->text('catatan_cust')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

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
        Schema::create('pos', function (Blueprint $table) {
            $table->id('pos_id');
            $table->decimal('subtotal', 10, 2);
            $table->decimal('diskon', 10, 2)->default(0.00);
            $table->decimal('total', 10, 2);
            $table->decimal('uang_dibayar', 10, 2);
            $table->decimal('kembalian', 10, 2)->default(0.00);
            $table->foreignId('metode_pembayaran_id')->constrained('metode_pembayarans', 'metode_pembayaran_id')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pos');
    }
};

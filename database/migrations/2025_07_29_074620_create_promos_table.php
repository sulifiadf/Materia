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
        Schema::create('promos', function (Blueprint $table) {
            $table->id('promo_id');
            $table->string('kode_promo')->unique();
            $table->string('nama_promo');
            $table->text('deskripsi')->nullable();
            $table->decimal('besar_diskon', 10, 2);
            $table->enum('tipe_diskon', ['persentase', 'nominal'])->default('persentase');
            $table->integer('min_pembelian')->default(0);
            $table->integer('max_penggunaan')->default(1);
            $table->dateTime('tanggal_mulai');
            $table->dateTime('tanggal_selesai');
            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promos');
    }
};

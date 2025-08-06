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
        Schema::create('produks', function (Blueprint $table) {
            $table->id('produk_id');
            $table->foreignId('kategori_id')->constrained('kategoris', 'kategori_id')->onDelete('cascade');
            $table->string('nama_produk');
            $table->text('deskripsi')->nullable();
            $table->decimal('harga_beli', 10, 2);
            $table->decimal('harga_jual', 10, 2);
            $table->integer('stok')->default(0);
            $table->enum('satuan', ['pcs','meter', 'kg', 'karung', 'dus']);
            $table->decimal('berat', 8, 2)->nullable();
            $table->string('merk')->nullable();
            $table->string('foto_produk')->nullable();
            $table->enum('status', ['tersedia', 'kosong'])->default('tersedia');
            $table->string('slug')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};

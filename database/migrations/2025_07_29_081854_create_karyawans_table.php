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
        Schema::create('karyawans', function (Blueprint $table) {
            $table->id('karyawan_id');
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('nomor_telepon')->nullable();
            $table->string('alamat')->nullable();
            $table->string('jabatan');
            $table->date('tanggal_masuk')->nullable();
            $table->decimal('gaji', 10, 2)->default(0.00);
            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif');
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawans');
    }
};

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
        Schema::create('metode_pengirimans', function (Blueprint $table) {
            $table->id('metode_pengiriman_id');
            $table->string('jenis_pengiriman');
            $table->integer('estimasi_hari')->nullable();
            $table->decimal('biaya_perKg', 10, 2)->nullable();
            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('metode_pengirimans');
    }
};

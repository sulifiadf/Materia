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
        Schema::table('produks', function (Blueprint $table) {
            $table->unsignedBigInteger('promo_id')->nullable()->after('kategori_id');
            $table->foreign('promo_id')->references('promo_id')->on('promos')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produks', function (Blueprint $table) {
            $table->dropForeign(['promo_id']);
            $table->dropColumn('promo_id');
        });
    }
};

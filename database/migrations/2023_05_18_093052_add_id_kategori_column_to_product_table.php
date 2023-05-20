<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::table('tb_product', function (Blueprint $table) {
            $table->unsignedBigInteger('id_kategori')->after('price')->default(2);
            $table->foreign('id_kategori')->references('id')->on('tb_kategori')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_product', function (Blueprint $table) {
            $table->dropForeign(['id_kateogori']);
            $table->dropColumn('id_kategori');
        });
    }
};

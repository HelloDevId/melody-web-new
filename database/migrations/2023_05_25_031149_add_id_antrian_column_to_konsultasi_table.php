<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('tb_konsultasi', function (Blueprint $table) {
            $table->unsignedBigInteger('id_antrian')->after('id')->default(2);
            $table->foreign('id_antrian')->references('id')->on('tb_antrian')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_konsultasi', function (Blueprint $table) {
            $table->dropForeign(['id_antrian']);
            $table->dropColumn('id_antrian');
        });
    }
};
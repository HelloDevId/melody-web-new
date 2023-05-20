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
        Schema::table('tb_presensi', function (Blueprint $table) {
            $table->unsignedBigInteger('id_jadwal_presensi')->after('id')->default(2);
            $table->foreign('id_jadwal_presensi')->references('id')->on('tb_jadwal_presensi')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_presensi', function (Blueprint $table) {
            $table->dropForeign(['id_jadwal_presensi']);
            $table->dropColumn('id_jadwal_presensi');
        });
    }
};

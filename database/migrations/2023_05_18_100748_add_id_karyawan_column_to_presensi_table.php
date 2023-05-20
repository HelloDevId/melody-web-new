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
            $table->unsignedBigInteger('id_karyawan')->after('id')->default(2);
            $table->foreign('id_karyawan')->references('id')->on('tb_karyawan')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_presensi', function (Blueprint $table) {
            $table->dropForeign(['id_karyawan']);
            $table->dropColumn('id_karyawan');
        });
    }
};

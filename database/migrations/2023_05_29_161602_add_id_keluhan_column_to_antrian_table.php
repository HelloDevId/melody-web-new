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
        Schema::table('tb_antrian', function (Blueprint $table) {
            $table->unsignedBigInteger('id_keluhan')->after('status')->default(2);
            $table->foreign('id_keluhan')->references('id')->on('tb_keluhan')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_antrian', function (Blueprint $table) {
            $table->dropForeign(['id_keluhan']);
            $table->dropColumn('id_keluhan');
        });
    }
};
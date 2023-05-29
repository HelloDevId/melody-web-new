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
        Schema::table('tb_user', function (Blueprint $table) {
            $table->unsignedBigInteger('id_kulit')->after('jenis_kelamin')->default(2)->nullable();
            $table->foreign('id_kulit')->references('id')->on('tb_kulit')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_user', function (Blueprint $table) {
            $table->dropForeign(['id_kulit']);
            $table->dropColumn('id_kulit');
        });
    }
};
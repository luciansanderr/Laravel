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
        //criando a coluna do fk
        Schema::table('pessoa_testes', function (Blueprint $table) {
            $table->unsignedBigInteger('pessoa_teste_id');
        });
        //criando o fk
        Schema::table('pessoa_testes', function (Blueprint $table) {
            $table->foreign('pessoa_teste_id')->references('id')->on('tipo_pessoa_testes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pessoa_testes', function (Blueprint $table) {
            $table->dropForeign('pessoa_testes_pessoa_teste_id_foreign');
            $table->dropColumn('pessoa_teste_id');
        });
    }
};

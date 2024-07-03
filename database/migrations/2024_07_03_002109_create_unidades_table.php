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
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->string('unidade', 5);
            $table->string('descricao', 30);
            $table->timestamps();
        });
        //criando o relacionamento da tabela
        Schema::table('produtos', function (Blueprint $table) {
            //criando uma nova coluna dentro de produtos
            $table->unsignedBigInteger('unidade_id');
            //referenciando a tabela
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });
        //criando o relacionamento da tabela
        Schema::table('produto_detalhes', function (Blueprint $table) {
            //criando uma nova coluna dentro de produtos detalhes
            $table->unsignedBigInteger('unidade_id');
            //referenciando a tabela
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //remoção de relacionamento das tabelas
        Schema::table('produtos', function (Blueprint $table) {
            //removendo o relacionamento
            $table->dropForeign('produtos_unidade_id_foreign');
            //remover coluna
            $table->dropColumn('unidade_id');
        });

        Schema::table('produto_detalhes', function (Blueprint $table) {
            //removendo o relacionamento
            $table->dropForeign('produto_detalhes_unidade_id_foreign');
            //remover coluna
            $table->dropColumn('unidade_id');
        });

        Schema::dropIfExists('unidades');
    }
};

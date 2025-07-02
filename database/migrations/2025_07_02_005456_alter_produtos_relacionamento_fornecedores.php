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
        Schema::table('produtos', function (Blueprint $table) {
            // Como já tenho dados na tabela preciso inserir um fornecedor para estabelecer o relacionamento
            $fornecedor_id = DB::table('fornecedores')->insertGetId([
                'nome' => 'Fornecedor Padrão',
                'site' => 'fornecedor.com.br',
                'uf' => 'MA',
                'email' => 'fornecedor@gmail.com'
            ]);
            $table->unsignedBigInteger('fornecedor_id')->default($fornecedor_id)->after('id');
            $table->foreign('fornecedor_id')->references('id')->on('fornecedores');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produtos', function (Blueprint $table) {
            $table->dropForeign('produto_fornecedor_id_foreign').
            $table->dropColumn('fornecedor_id');
        });
    }
};

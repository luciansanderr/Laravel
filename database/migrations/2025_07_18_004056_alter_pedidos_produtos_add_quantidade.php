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
        Schema::table('pedidos_produtos', function (Blueprint $table) {
            // Adiciona a coluna quantidade na tabela pedidos_produtos
            $table->integer('quantidade')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pedidos_produtos', function (Blueprint $table) {
            // Adiciona a coluna quantidade na tabela pedidos_produtos
            $table->dropColumn('quantidade');
        });
    }
};

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
        Schema::table('fornecedores', function (Blueprint $table) {
            $table->string('uf', 500);
            $table->string('email', 500);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fornecedores', function (Blueprint $table) {
            //remover colunas
            // $table->dropColumn('uf');
            // $table->dropColumn('email');
            //pode passar também uma array de colunas
            //$table->dropColumn(['uf', 'email']);
        });
    }
};

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
        Schema::create('municipios', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 20);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('pessoas', function (Blueprint $table) {
        //     $table->dropForeign('pessoas_municipio_id_foreign');
        //     $table->dropColumn('municipio_id');
        // });

        Schema::dropIfExists('municipios');
    }
};

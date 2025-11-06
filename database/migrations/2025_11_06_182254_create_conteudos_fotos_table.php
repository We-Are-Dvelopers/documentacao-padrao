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
        Schema::create('conteudo_fotos', function (Blueprint $table) {
            $table->id();
            $table->integer('id_conteudo');
            $table->integer('id_media');
           $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
  
         Schema::dropIfExists('conteudo_fotos');
    }
};

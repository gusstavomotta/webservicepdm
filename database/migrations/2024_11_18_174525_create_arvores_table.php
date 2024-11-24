<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArvoresTable extends Migration
{
    public function up(): void
    {
        Schema::create('arvores', function (Blueprint $table) {
            $table->id();
            $table->string('nome_popular')->nullable();
            $table->text('descricao_botanica')->nullable();
            $table->json('taxonomia')->nullable();
            $table->json('biologia_reprodutiva')->nullable();
            $table->json('ocorrencia_natural')->nullable();
            $table->json('aspectos_ecologicos')->nullable();
            $table->text('regeneracao_natural')->nullable();
            $table->json('aproveitamento')->nullable();
            $table->string('paisagismo')->nullable();
            $table->json('cultivo')->nullable();
            $table->json('composicao_nutricional')->nullable();
            $table->json('pragas')->nullable();
            $table->json('solos')->nullable();
            $table->string('imagem_url')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('arvores');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arvore extends Model
{
    use HasFactory;

    protected $table = 'arvores';

    protected $fillable = [
        'nome_popular',
        'descricao_botanica',
        'taxonomia', // Novo
        'biologia_reprodutiva',
        'ocorrencia_natural',
        'aspectos_ecologicos',
        'regeneracao_natural',
        'aproveitamento',
        'paisagismo',
        'cultivo',
        'composicao_nutricional', // Novo
        'pragas', // Novo
        'solos', // Novo
        'imagem_url', // Novo campo

    ];
    
    protected $casts = [
        'taxonomia' => 'array', // Novo
        'biologia_reprodutiva' => 'array',
        'ocorrencia_natural' => 'array',
        'aspectos_ecologicos' => 'array',
        'aproveitamento' => 'array',
        'cultivo' => 'array',
        'composicao_nutricional' => 'array', // Novo
        'pragas' => 'array', // Novo
        'solos' => 'array', // Novo
    ];
}
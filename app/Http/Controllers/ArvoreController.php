<?php

namespace App\Http\Controllers;

use App\Models\Arvore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArvoreController extends Controller
{
    public function index()
    {
        try {
            $arvores = Arvore::all();
            return response()->json(['data' => $arvores], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro ao buscar árvores'], 500);
        }
    }

    public function show($id)
    {
        try {
            $arvore = Arvore::find($id);

            if (!$arvore) {
                return response()->json(['message' => 'Árvore não encontrada'], 404);
            }

            return response()->json(['data' => $arvore], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro ao buscar árvore'], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'nome_popular' => 'required|string',
                'descricao_botanica' => 'required|string',
                'taxonomia' => 'required|array',
                'biologia_reprodutiva' => 'required|array',
                'ocorrencia_natural' => 'required|array',
                'aspectos_ecologicos' => 'required|array',
                'regeneracao_natural' => 'required|string',
                'aproveitamento' => 'required|array',
                'paisagismo' => 'required|string',
                'cultivo' => 'required|array',
                'composicao_nutricional' => 'required|array',
                'pragas' => 'required|array',
                'solos' => 'required|array',
                'imagem_url' => 'nullable|string', 
            ]);
    
            $arvore = Arvore::create($data);
    
            return response()->json(['message' => 'Árvore cadastrada com sucesso!', 'data' => $arvore], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro ao cadastrar árvore', 'error' => $e->getMessage()], 500);
        }
    }
    



public function update(Request $request, $id)
{
    try {
        $arvore = Arvore::find($id);

        if (!$arvore) {
            return response()->json(['message' => 'Árvore não encontrada'], 404);
        }

        $data = $request->validate([
            'nome_popular' => 'nullable|string',
            'descricao_botanica' => 'nullable|string',
            'taxonomia' => 'nullable|array',
            'biologia_reprodutiva' => 'nullable|array',
            'ocorrencia_natural' => 'nullable|array',
            'aspectos_ecologicos' => 'nullable|array',
            'regeneracao_natural' => 'nullable|string',
            'aproveitamento' => 'nullable|array',
            'paisagismo' => 'nullable|string',
            'cultivo' => 'nullable|array',
            'composicao_nutricional' => 'nullable|array',
            'pragas' => 'nullable|array',
            'solos' => 'nullable|array',
            'imagem' => 'nullable|string',
        ]);

        $data['imagem_url'] = $data['imagem'] ?? $arvore->imagem_url;

        $arvore->update($data);

        return response()->json(['message' => 'Árvore atualizada com sucesso!', 'data' => $arvore], 200);
    } catch (\Exception $e) {
        return response()->json(['message' => 'Erro ao atualizar árvore', 'error' => $e->getMessage()], 500);
    }
}


    public function destroy($id)
    {
        try {
            $arvore = Arvore::find($id);

            if (!$arvore) {
                return response()->json(['message' => 'Árvore não encontrada'], 404);
            }

            if ($arvore->imagem_url) {
                $oldPath = str_replace(url('storage') . '/', '', $arvore->imagem_url);
                Storage::disk('public')->delete($oldPath);
            }

            $arvore->delete();

            return response()->json(['message' => 'Árvore removida com sucesso'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro ao remover árvore'], 500);
        }
    }
}

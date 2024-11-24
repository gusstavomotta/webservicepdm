<?php


namespace App\Http\Controllers;

use App\Models\Arvore;
use Illuminate\Http\Request;

class ArvoreWebController extends Controller
{
    public function index()
    {
        $arvores = Arvore::all();
        return view('arvores.listar_arvores', compact('arvores'));
    }

    public function create()
    {
        return view('arvores.adicionar_arvore');
    }

    public function store(Request $request)
    {

        try {
            $data = $request->validate([
                'nome_popular' => 'required|string',
                'descricao_botanica' => 'required|string',
                'taxonomia' => 'nullable|array',
                'biologia_reprodutiva' => 'nullable|array',
                'ocorrencia_natural' => 'nullable|array',
                'aspectos_ecologicos' => 'nullable|array',
                'regeneracao_natural' => 'required|string',
                'aproveitamento' => 'nullable|array',
                'paisagismo' => 'nullable|string',
                'cultivo' => 'nullable|array',
                'composicao_nutricional' => 'nullable|array',
                'pragas' => 'nullable|array',
                'solos' => 'nullable|array',
                'imagem_url' => 'nullable|string',
            ]);
    
            Arvore::create($data);
    
            return redirect()->route('arvores.index')->with('success', 'Árvore cadastrada com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Erro ao cadastrar árvore.']);
        }
    }
    

    public function show($id)
    {
        $arvore = Arvore::findOrFail($id);
        return view('arvores.detalhes_arvore', compact('arvore')); 
    }

    public function edit($id)
    {
        $arvore = Arvore::findOrFail($id);
        return view('arvores.editar_arvore', compact('arvore'));
    }

    public function update(Request $request, $id)
    {
        $arvore = Arvore::findOrFail($id);

        $data = $request->validate([
            'nome_popular' => 'required|string',
            'descricao_botanica' => 'required|string',
            'taxonomia' => 'nullable|array',
            'biologia_reprodutiva' => 'nullable|array',
            'ocorrencia_natural' => 'nullable|array',
            'aspectos_ecologicos' => 'nullable|array',
            'regeneracao_natural' => 'required|string',
            'aproveitamento' => 'nullable|array',
            'paisagismo' => 'nullable|string',
            'cultivo' => 'nullable|array',
            'composicao_nutricional' => 'nullable|array',
            'pragas' => 'nullable|array',
            'solos' => 'nullable|array',
            'imagem_url' => 'nullable|string',
        ]);

        $arvore->update($data);

        return redirect()->route('arvores.index')->with('success', 'Árvore atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $arvore = Arvore::findOrFail($id);
        $arvore->delete();

        return redirect()->route('arvores.index')->with('success', 'Árvore removida com sucesso!');
    }
}

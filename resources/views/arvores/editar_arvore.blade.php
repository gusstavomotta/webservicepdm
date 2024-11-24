@extends('layouts.app')

@section('content')
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #eaf4ea; /* Fundo com tom verde claro */
            margin-top: 50px;
        }

        h1 {
            color: #2e7d32; /* Verde escuro para o título */
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            color: #2e7d32; /* Verde escuro para as labels */
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            margin-top: 5px;
        }

        .btn-primary {
            background-color: #28a745; /* Verde principal */
            border: none;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
        }

        .btn-primary:hover {
            background-color: #218838; /* Verde mais escuro ao passar o mouse */
        }

        .btn-secondary {
            background-color: #6c757d; /* Cinza para botão de voltar */
            border: none;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
        }

        .btn-secondary:hover {
            background-color: #5a6268; /* Cinza mais escuro ao passar o mouse */
        }

        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
    </style>

    <div class="container">
        <h1>Editar Árvore</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('arvores.update', $arvore->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Campo Nome Popular -->
            <div class="form-group">
                <label for="nome_popular">Nome Popular:</label>
                <input type="text" name="nome_popular" class="form-control" value="{{ old('nome_popular', $arvore->nome_popular) }}" required>
            </div>

            <!-- Campo Descrição Botânica -->
            <div class="form-group">
                <label for="descricao_botanica">Descrição Botânica:</label>
                <textarea name="descricao_botanica" class="form-control" required>{{ old('descricao_botanica', $arvore->descricao_botanica) }}</textarea>
            </div>

            <!-- Taxonomia -->
            <div class="form-group">
                <label>Taxonomia:</label>
                <input type="text" name="taxonomia[divisao]" class="form-control" value="{{ old('taxonomia.divisao', $arvore->taxonomia['divisao'] ?? '') }}" placeholder="Divisão">
                <input type="text" name="taxonomia[clado]" class="form-control" value="{{ old('taxonomia.clado', $arvore->taxonomia['clado'] ?? '') }}" placeholder="Clado">
                <input type="text" name="taxonomia[ordem]" class="form-control" value="{{ old('taxonomia.ordem', $arvore->taxonomia['ordem'] ?? '') }}" placeholder="Ordem">
                <input type="text" name="taxonomia[familia]" class="form-control" value="{{ old('taxonomia.familia', $arvore->taxonomia['familia'] ?? '') }}" placeholder="Família">
                <input type="text" name="taxonomia[subfamilia]" class="form-control" value="{{ old('taxonomia.subfamilia', $arvore->taxonomia['subfamilia'] ?? '') }}" placeholder="Subfamília">
                <input type="text" name="taxonomia[genero]" class="form-control" value="{{ old('taxonomia.genero', $arvore->taxonomia['genero'] ?? '') }}" placeholder="Gênero">
                <input type="text" name="taxonomia[tribo]" class="form-control" value="{{ old('taxonomia.tribo', $arvore->taxonomia['tribo'] ?? '') }}" placeholder="Tribo">
                <input type="text" name="taxonomia[binomio_especifico]" class="form-control" value="{{ old('taxonomia.binomio_especifico', $arvore->taxonomia['binomio_especifico'] ?? '') }}" placeholder="Binômio Específico">
                <input type="text" name="taxonomia[sinonimia_botanica]" class="form-control" value="{{ old('taxonomia.sinonimia_botanica', $arvore->taxonomia['sinonimia_botanica'] ?? '') }}" placeholder="Sinonímia Botânica">
            </div>

            <!-- Biologia Reprodutiva -->
            <div class="form-group">
                <label>Biologia Reprodutiva:</label>
                <input type="text" name="biologia_reprodutiva[sistema_sexual]" class="form-control" value="{{ old('biologia_reprodutiva.sistema_sexual', $arvore->biologia_reprodutiva['sistema_sexual'] ?? '') }}" placeholder="Sistema Sexual">
                <input type="text" name="biologia_reprodutiva[vetor_polinizacao]" class="form-control" value="{{ old('biologia_reprodutiva.vetor_polinizacao', $arvore->biologia_reprodutiva['vetor_polinizacao'] ?? '') }}" placeholder="Vetor de Polinização">

                <label>Floração:</label>
                <input type="text" name="biologia_reprodutiva[floracao][Amazonas]" class="form-control" value="{{ old('biologia_reprodutiva.floracao.Amazonas', $arvore->biologia_reprodutiva['floracao']['Amazonas'] ?? '') }}" placeholder="Amazonas">
                <input type="text" name="biologia_reprodutiva[floracao][Pernambuco]" class="form-control" value="{{ old('biologia_reprodutiva.floracao.Pernambuco', $arvore->biologia_reprodutiva['floracao']['Pernambuco'] ?? '') }}" placeholder="Pernambuco">
                <input type="text" name="biologia_reprodutiva[floracao][São Paulo]" class="form-control" value="{{ old('biologia_reprodutiva.floracao.São Paulo', $arvore->biologia_reprodutiva['floracao']['São Paulo'] ?? '') }}" placeholder="São Paulo">
            </div>

            <!-- Ocorrência Natural -->
            <div class="form-group">
                <label>Ocorrência Natural:</label>
                <label>Latitude:</label>
                <input type="text" name="ocorrencia_natural[latitude][norte]" class="form-control" value="{{ old('ocorrencia_natural.latitude.norte', $arvore->ocorrencia_natural['latitude']['norte'] ?? '') }}" placeholder="Latitude Norte">
                <input type="text" name="ocorrencia_natural[latitude][sul]" class="form-control" value="{{ old('ocorrencia_natural.latitude.sul', $arvore->ocorrencia_natural['latitude']['sul'] ?? '') }}" placeholder="Latitude Sul">

                <label>Altitude:</label>
                <input type="text" name="ocorrencia_natural[altitude][min]" class="form-control" value="{{ old('ocorrencia_natural.altitude.min', $arvore->ocorrencia_natural['altitude']['min'] ?? '') }}" placeholder="Altitude Mínima">
                <input type="text" name="ocorrencia_natural[altitude][max]" class="form-control" value="{{ old('ocorrencia_natural.altitude.max', $arvore->ocorrencia_natural['altitude']['max'] ?? '') }}" placeholder="Altitude Máxima">

                <label for="mapa">Mapa:</label>
                <input type="text" name="ocorrencia_natural[mapa]" class="form-control" value="{{ old('ocorrencia_natural.mapa', $arvore->ocorrencia_natural['mapa'] ?? '') }}" placeholder="URL do Mapa">
            </div>

            <!-- Aspectos Ecológicos -->
            <div class="form-group">
                <label>Aspectos Ecológicos:</label>
                <input type="text" name="aspectos_ecologicos[grupo_sucessional]" class="form-control" value="{{ old('aspectos_ecologicos.grupo_sucessional', $arvore->aspectos_ecologicos['grupo_sucessional'] ?? '') }}" placeholder="Grupo Sucessional">
                <input type="text" name="aspectos_ecologicos[importancia_sociologica]" class="form-control" value="{{ old('aspectos_ecologicos.importancia_sociologica', $arvore->aspectos_ecologicos['importancia_sociologica'] ?? '') }}" placeholder="Importância Sociológica">
                <input type="text" name="aspectos_ecologicos[ciclo_vida]" class="form-control" value="{{ old('aspectos_ecologicos.ciclo_vida', $arvore->aspectos_ecologicos['ciclo_vida'] ?? '') }}" placeholder="Ciclo de Vida">
            </div>

            <!-- Regeneração Natural -->
            <div class="form-group">
                <label for="regeneracao_natural">Regeneração Natural:</label>
                <textarea name="regeneracao_natural" class="form-control">{{ old('regeneracao_natural', $arvore->regeneracao_natural) }}</textarea>
            </div>

            <!-- Aproveitamento -->
            <div class="form-group">
                <label>Aproveitamento:</label>

                <label>Dados Nutricionais:</label>
                <input type="text" name="aproveitamento[alimentacao][dados_nutricionais][carboidratos]" class="form-control" value="{{ old('aproveitamento.alimentacao.dados_nutricionais.carboidratos', $arvore->aproveitamento['alimentacao']['dados_nutricionais']['carboidratos'] ?? '') }}" placeholder="Carboidratos">
                <input type="text" name="aproveitamento[alimentacao][dados_nutricionais][proteinas]" class="form-control" value="{{ old('aproveitamento.alimentacao.dados_nutricionais.proteinas', $arvore->aproveitamento['alimentacao']['dados_nutricionais']['proteinas'] ?? '') }}" placeholder="Proteínas">

                <label>Formas de Consumo:</label>
                <input type="text" name="aproveitamento[alimentacao][formas_consumo][polpa]" class="form-control" value="{{ old('aproveitamento.alimentacao.formas_consumo.polpa', $arvore->aproveitamento['alimentacao']['formas_consumo']['polpa'] ?? '') }}" placeholder="Consumo Polpa">
                <input type="text" name="aproveitamento[alimentacao][formas_consumo][sementes]" class="form-control" value="{{ old('aproveitamento.alimentacao.formas_consumo.sementes', $arvore->aproveitamento['alimentacao']['formas_consumo']['sementes'] ?? '') }}" placeholder="Consumo Sementes">

                <label for="bioatividade">Bioatividade:</label>
                <input type="text" name="aproveitamento[bioatividade]" class="form-control" value="{{ old('aproveitamento.bioatividade', $arvore->aproveitamento['bioatividade'] ?? '') }}" placeholder="Bioatividade">
            </div>

            <!-- Cultivo -->
            <div class="form-group">
                <label>Cultivo:</label>
                <input type="text" name="cultivo[colheita_beneficiamento]" class="form-control" value="{{ old('cultivo.colheita_beneficiamento', $arvore->cultivo['colheita_beneficiamento'] ?? '') }}" placeholder="Colheita e Beneficiamento">

                <label>Produção de Mudas:</label>
                <input type="text" name="cultivo[producao_mudas][semeadura]" class="form-control" value="{{ old('cultivo.producao_mudas.semeadura', $arvore->cultivo['producao_mudas']['semeadura'] ?? '') }}" placeholder="Semeadura">
                <input type="text" name="cultivo[producao_mudas][germinacao]" class="form-control" value="{{ old('cultivo.producao_mudas.germinacao', $arvore->cultivo['producao_mudas']['germinacao'] ?? '') }}" placeholder="Germinação">
            </div>

            <!-- Composição Nutricional -->
            <div class="form-group">
                <label>Composição Nutricional:</label>
                <input type="text" name="composicao_nutricional[carboidratos]" class="form-control" value="{{ old('composicao_nutricional.carboidratos', $arvore->composicao_nutricional['carboidratos'] ?? '') }}" placeholder="Carboidratos">
                <input type="text" name="composicao_nutricional[proteinas]" class="form-control" value="{{ old('composicao_nutricional.proteinas', $arvore->composicao_nutricional['proteinas'] ?? '') }}" placeholder="Proteínas">
                @foreach ($arvore->composicao_nutricional['minerais'] ?? [] as $key => $value)
                    <input type="text" name="composicao_nutricional[minerais][{{ $key }}]" class="form-control" value="{{ old("composicao_nutricional.minerais.$key", $value) }}" placeholder="Mineral">
                @endforeach
            </div>

            <!-- Pragas -->
            <div class="form-group">
                <label>Pragas:</label>
                @foreach ($arvore->pragas ?? [] as $key => $value)
                    <input type="text" name="pragas[{{ $key }}]" class="form-control" value="{{ old("pragas.$key", $value) }}"/>
                @endforeach
            </div>

            <!-- Solos -->
            <div class="form-group">
                <label>Solos:</label>
                <input type="text" name="solos[tipo]" class="form-control" value="{{ old('solos.tipo', $arvore->solos['tipo'] ?? '') }}" placeholder="Tipo de Solo">
                <input type="text" name="solos[pH]" class="form-control" value="{{ old('solos.pH', $arvore->solos['pH'] ?? '') }}" placeholder="pH">
                @foreach ($arvore->solos['resistencia'] ?? [] as $key => $value)
                    <input type="text" name="solos[resistencia][{{ $key }}]" class="form-control" value="{{ old("solos.resistencia.$key", $value) }}" placeholder="Resistência"/>
                @endforeach
            </div>

            <div class="form-group">
                <label for="imagem_url">URL da Imagem:</label>
                <input type="text" name="imagem_url" class="form-control" value="{{ old('imagem_url', $arvore->imagem_url) }}"/>
            </div>

            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
            <a href="{{ route('arvores.index') }}" class="btn btn-secondary">Voltar</a>
        </form>
    </div>
@endsection

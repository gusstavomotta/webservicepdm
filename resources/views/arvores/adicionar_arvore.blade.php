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
        <h1>Adicionar Nova Árvore</h1>

        <!-- Verifique e exiba erros de validação -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulário de Criação -->
        <form action="{{ route('arvores.store') }}" method="POST">
            @csrf

            <!-- Campo Nome Popular -->
            <div class="form-group">
                <label for="nome_popular">Nome Popular:</label>
                <input type="text" name="nome_popular" class="form-control" required>
            </div>

            <!-- Campo Descrição Botânica -->
            <div class="form-group">
                <label for="descricao_botanica">Descrição Botânica:</label>
                <textarea name="descricao_botanica" class="form-control" required></textarea>
            </div>

            <!-- Taxonomia -->
            <div class="form-group">
                <label>Taxonomia:</label>
                <input type="text" name="taxonomia[divisao]" class="form-control" placeholder="Divisão">
                <input type="text" name="taxonomia[clado]" class="form-control" placeholder="Clado">
                <input type="text" name="taxonomia[ordem]" class="form-control" placeholder="Ordem">
                <input type="text" name="taxonomia[familia]" class="form-control" placeholder="Família">
                <input type="text" name="taxonomia[subfamilia]" class="form-control" placeholder="Subfamília">
                <input type="text" name="taxonomia[genero]" class="form-control" placeholder="Gênero">
                <input type="text" name="taxonomia[tribo]" class="form-control" placeholder="Tribo">
                <input type="text" name="taxonomia[binomio_especifico]" class="form-control" placeholder="Binômio Específico">
                <input type="text" name="taxonomia[sinonimia_botanica]" class="form-control" placeholder="Sinonímia Botânica">
            </div>

            <!-- Biologia Reprodutiva -->
            <div class="form-group">
                <label>Biologia Reprodutiva:</label>
                <input type="text" name="biologia_reprodutiva[sistema_sexual]" class="form-control" placeholder="Sistema Sexual">
                <input type="text" name="biologia_reprodutiva[vetor_polinizacao]" class="form-control" placeholder="Vetor de Polinização">

                <label>Floração:</label>
                <input type="text" name="biologia_reprodutiva[floracao][Amazonas]" class="form-control" placeholder="Amazonas">
                <input type="text" name="biologia_reprodutiva[floracao][Pernambuco]" class="form-control" placeholder="Pernambuco">
                <input type="text" name="biologia_reprodutiva[floracao][São Paulo]" class="form-control" placeholder="São Paulo">

                <label>Frutificação:</label>
                <input type="text" name="biologia_reprodutiva[frutificacao][Rio de Janeiro]" class="form-control" placeholder="Rio de Janeiro">
                <input type="text" name="biologia_reprodutiva[frutificacao][Paraná]" class="form-control" placeholder="Paraná">

                <label>Dispersão:</label>
                <input type="text" name="biologia_reprodutiva[dispersao][tipos][]" class="form-control" placeholder="Tipo de Dispersão">
                <input type="text" name="biologia_reprodutiva[dispersao][animais][]" class="form-control" placeholder="Animais Envolvidos">
            </div>

            <!-- Ocorrência Natural -->
            <div class="form-group">
                <label>Ocorrência Natural:</label>
                <input type="text" name="ocorrencia_natural[latitude][norte]" class="form-control" placeholder="Latitude Norte">
                <input type="text" name="ocorrencia_natural[latitude][sul]" class="form-control" placeholder="Latitude Sul">
                <input type="text" name="ocorrencia_natural[altitude][min]" class="form-control" placeholder="Altitude Mínima">
                <input type="text" name="ocorrencia_natural[altitude][max]" class="form-control" placeholder="Altitude Máxima">
                <input type="text" name="ocorrencia_natural[mapa]" class="form-control" placeholder="URL do Mapa">
            </div>

            <!-- Aspectos Ecológicos -->
            <div class="form-group">
                <label>Aspectos Ecológicos:</label>
                <input type="text" name="aspectos_ecologicos[grupo_sucessional]" class="form-control" placeholder="Grupo Sucessional">
                <input type="text" name="aspectos_ecologicos[importancia_sociologica]" class="form-control" placeholder="Importância Sociológica">
                <input type="text" name="aspectos_ecologicos[ciclo_vida]" class="form-control" placeholder="Ciclo de Vida">
            </div>

            <!-- Regeneração Natural -->
            <div class="form-group">
                <label for="regeneracao_natural">Regeneração Natural:</label>
                <textarea name="regeneracao_natural" class="form-control" required></textarea>
            </div>
            
            <!-- Aproveitamento -->
            <div class="form-group">
                <label>Aproveitamento:</label>
                <label>Alimentação:</label>
                <input type="text" name="aproveitamento[alimentacao][dados_nutricionais][carboidratos]" class="form-control" placeholder="Carboidratos">
                <input type="text" name="aproveitamento[alimentacao][dados_nutricionais][proteinas]" class="form-control" placeholder="Proteínas">
                <input type="text" name="aproveitamento[alimentacao][formas_consumo][polpa]" class="form-control" placeholder="Forma de Consumo (Polpa)">
                <input type="text" name="aproveitamento[alimentacao][formas_consumo][sementes]" class="form-control" placeholder="Forma de Consumo (Sementes)">
                <input type="text" name="aproveitamento[bioatividade]" class="form-control" placeholder="Bioatividade">
            </div>

            <!-- Paisagismo -->
            <div class="form-group">
                <label for="paisagismo">Paisagismo:</label>
                <input type="text" name="paisagismo" class="form-control">
            </div>

            <!-- Cultivo -->
            <div class="form-group">
                <label>Cultivo:</label>
                <input type="text" name="cultivo[colheita_beneficiamento]" class="form-control" placeholder="Colheita e Beneficiamento">
                <label>Produção de Mudas:</label>
                <input type="text" name="cultivo[producao_mudas][semeadura]" class="form-control" placeholder="Semeadura">
                <input type="text" name="cultivo[producao_mudas][germinacao]" class="form-control" placeholder="Germinação">
            </div>

            <!-- Composição Nutricional -->
            <div class="form-group">
                <label>Composição Nutricional:</label>
                <input type="text" name="composicao_nutricional[carboidratos]" class="form-control" placeholder="Carboidratos">
                <input type="text" name="composicao_nutricional[proteinas]" class="form-control" placeholder="Proteínas">
                <input type="text" name="composicao_nutricional[minerais][]" class="form-control" placeholder="Minerais">
            </div>

            <!-- Pragas -->
            <div class="form-group">
                <label>Pragas:</label>
                <input type="text" name="pragas[]" class="form-control" placeholder="Praga">
            </div>

            <!-- Solos -->
            <div class="form-group">
                <label>Solos:</label>
                <input type="text" name="solos[tipo]" class="form-control" placeholder="Tipo de Solo">
                <input type="text" name="solos[pH]" class="form-control" placeholder="pH">
                <input type="text" name="solos[resistencia][]" class="form-control" placeholder="Resistência">
            </div>

            <!-- URL da Imagem -->
            <div class="form-group">
                <label for="imagem_url">URL da Imagem:</label>
                <input type="text" name="imagem_url" class="form-control">
            </div>

            <!-- Botões -->
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="{{ route('main') }}" class="btn btn-secondary">Voltar</a>
        </form>
    </div>
@endsection

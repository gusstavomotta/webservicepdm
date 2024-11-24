@extends('layouts.app')

@section('content')
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #eaf4ea;
            margin-top: 50px;
        }

        h1, h2 {
            color: #2e7d32;
            text-align: center;
        }

        .card {
            background-color: #fff;
            border: 1px solid #ced4da;
            border-radius: 10px;
            padding: 20px;
            width: 80%;
            margin: 20px auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-body p, .card-body ul {
            color: #2e7d32;
            font-size: 16px;
            line-height: 1.5;
            margin-bottom: 10px;
        }

        ul {
            padding-left: 20px;
            list-style: disc;
        }

        .btn-secondary {
            background-color: #6c757d;
            border: none;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        strong {
            color: #388e3c;
        }
    </style>

    <div class="container">
        <h1>Detalhes da Árvore</h1>

        <div class="card">
            <div class="card-body">
                <h2>{{ $arvore->nome_popular }}</h2>

                <p><strong>Descrição Botânica:</strong> {{ $arvore->descricao_botanica }}</p>

                @php
                    // Função recursiva para exibir os dados
                    function displayData($data) {
                        echo '<ul>';
                        foreach($data as $key => $value) {
                            if(is_array($value)) {
                                echo '<li><strong>' . ucfirst($key) . ':</strong>';
                                displayData($value); // Chamada recursiva
                                echo '</li>';
                            } else {
                                echo '<li><strong>' . ucfirst($key) . ':</strong> ' . $value . '</li>';
                            }
                        }
                        echo '</ul>';
                    }
                @endphp

                @if($arvore->taxonomia)
                    <p><strong>Taxonomia:</strong></p>
                    {!! displayData($arvore->taxonomia) !!}
                @endif

                @if($arvore->biologia_reprodutiva)
                    <p><strong>Biologia Reprodutiva:</strong></p>
                    {!! displayData($arvore->biologia_reprodutiva) !!}
                @endif

                @if($arvore->ocorrencia_natural)
                    <p><strong>Ocorrência Natural:</strong></p>
                    {!! displayData($arvore->ocorrencia_natural) !!}
                @endif

                @if($arvore->aspectos_ecologicos)
                    <p><strong>Aspectos Ecológicos:</strong></p>
                    {!! displayData($arvore->aspectos_ecologicos) !!}
                @endif

                <p><strong>Regeneração Natural:</strong> {{ $arvore->regeneracao_natural }}</p>

                @if($arvore->aproveitamento)
                    <p><strong>Aproveitamento:</strong></p>
                    {!! displayData($arvore->aproveitamento) !!}
                @endif

                <p><strong>Paisagismo:</strong> {{ $arvore->paisagismo }}</p>

                @if($arvore->cultivo)
                    <p><strong>Cultivo:</strong></p>
                    {!! displayData($arvore->cultivo) !!}
                @endif

                @if($arvore->composicao_nutricional)
                    <p><strong>Composição Nutricional:</strong></p>
                    {!! displayData($arvore->composicao_nutricional) !!}
                @endif

                @if($arvore->pragas)
                    <p><strong>Pragas:</strong></p>
                    {!! displayData($arvore->pragas) !!}
                @endif

                @if($arvore->solos)
                    <p><strong>Solos:</strong></p>
                    {!! displayData($arvore->solos) !!}
                @endif

                <p><strong>Imagem URL:</strong> {{ $arvore->imagem_url }}</p>

                <a href="{{ route('arvores.index') }}" class="btn btn-secondary">Voltar</a>
            </div>
        </div>
    </div>
@endsection

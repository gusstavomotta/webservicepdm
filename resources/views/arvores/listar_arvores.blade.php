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
            margin-bottom: 30px;
        }

        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
            padding: 15px;
            border-radius: 5px;
            width: 80%;
            margin: 0 auto 20px auto;
        }

        .table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
            border-spacing: 0;
        }

        .table th, .table td {
            border: 1px solid #ced4da;
            padding: 10px;
            text-align: center;
        }

        .table th {
            background-color: #28a745;
            color: #fff;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f2f2f2; /* Cor alternada para linhas da tabela */
        }

        .btn {
            padding: 8px 15px;
            border-radius: 5px;
            text-decoration: none;
            color: #fff;
            margin-right: 5px;
        }

        .btn-info {
            background-color: #17a2b8; /* Azul claro para o botão de detalhes */
            border: none;
        }

        .btn-info:hover {
            background-color: #138496; /* Azul mais escuro ao passar o mouse */
        }

        .btn-warning {
            background-color: #ffc107; /* Laranja para o botão de editar */
            border: none;
            color: #212529;
        }

        .btn-warning:hover {
            background-color: #e0a800; /* Laranja mais escuro ao passar o mouse */
        }

        .btn-danger {
            background-color: #dc3545; /* Vermelho para o botão de remover */
            border: none;
        }

        .btn-danger:hover {
            background-color: #c82333; /* Vermelho mais escuro ao passar o mouse */
        }

        .btn-secondary {
            background-color: #6c757d; /* Cinza para botão de voltar */
            border: none;
            padding: 10px 20px;
            margin-top: 20px;
            display: block;
            width: fit-content;
            margin-left: auto;
            margin-right: auto;
        }

        .btn-secondary:hover {
            background-color: #5a6268; /* Cinza mais escuro ao passar o mouse */
        }
    </style>

    <div class="container">
        <h1>Lista de Árvores</h1>

        <!-- Mensagem de Sucesso -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tabela de Árvores -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome Popular</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($arvores as $arvore)
                    <tr>
                        <td>{{ $arvore->id }}</td>
                        <td>{{ $arvore->nome_popular }}</td>
                        <td>
                            <!-- Botão Detalhes -->
                            <a href="{{ route('arvores.show', $arvore->id) }}" class="btn btn-info">Detalhes</a>

                            <!-- Botão Editar -->
                            <a href="{{ route('arvores.edit', $arvore->id) }}" class="btn btn-warning">Editar</a>

                            <!-- Formulário para Remover -->
                            <form action="{{ route('arvores.destroy', $arvore->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta árvore?')">Remover</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Botão Voltar -->
        <a href="{{ route('main') }}" class="btn btn-secondary">Voltar</a>
    </div>
@endsection

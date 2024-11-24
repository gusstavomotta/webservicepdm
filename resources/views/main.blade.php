<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Árvores</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #eaf4ea; /* Fundo com tom verde claro */
            text-align: center;
            margin-top: 50px;
        }
        .btn {
            display: inline-block;
            margin: 10px;
            padding: 15px 25px;
            font-size: 16px;
            color: #fff;
            background-color: #28a745; /* Verde principal */
            text-decoration: none;
            border-radius: 5px;
        }
        .btn:hover {
            background-color: #218838; /* Tom de verde mais escuro ao passar o mouse */
        }
        h1 {
            color: #2e7d32; /* Verde escuro para o título */
        }
    </style>
</head>
<body>

    <h1>Gerenciamento de Árvores</h1>
    
    <!-- Botão para criar uma nova árvore -->
    <a href="{{ route('arvores.create') }}" class="btn">Adicionar Nova Árvore</a>

    <!-- Botão para entrar nas ações -->
    <a href="{{ route('arvores.index') }}" class="btn">Ações Árvore</a>

</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>Sistema de Árvores</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Meta tag CSRF para requisições POST -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div class="container">
        @yield('content')
    </div>

    <!-- Incluir jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Seção para scripts adicionais -->
    @yield('scripts')
</body>
</html>

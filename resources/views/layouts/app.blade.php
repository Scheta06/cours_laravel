<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Конфигуратор ПК</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @vite(['resources/css/index.css', 'resources/css/partials.css', 'resources/css/main.css', 'resources/css/auth.css',])
</head>
<body>
    @include('partials.header')
    @yield('content')


    @include('partials.footer')
</body>
</html>

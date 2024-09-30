<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- <link rel="preconnect" href="https://fonts.googleapis.com"> --}}
    {{-- <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Catamaran:wght@100..900&family=Cormorant+Infant:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Hind+Madurai:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <x-nav />
    <div
        class="min-vh-100 marginCustom @if (Route::currentRouteName() == 'login') bgPage2
    @elseif(Route::currentRouteName() == 'register') bgPage 
    @elseif(Route::currentRouteName() == 'article.index') colorCover 
    @elseif(Route::currentRouteName() == 'home') colorCover 
    @elseif(Route::currentRouteName() == 'article.create') bgPage
    @elseif(Route::currentRouteName() == 'careers') bgPage @endif">
        {{ $slot }}
    </div>
    <x-footer />


</body>
<script src="main.js"></script>

</html>

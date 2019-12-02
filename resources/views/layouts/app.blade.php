<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="A simple gif API project.">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>Gif API</title>
        
    <link rel="icon" href="favicon.ico" type="image/x-icon"/>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container mx-auto" id="app">
        <navbar></navbar>
        <main>
            @yield('content')
        </main>
    </div>
    <script defer src="{{ asset('js/app.js') }}"></script>
</body>
</html>

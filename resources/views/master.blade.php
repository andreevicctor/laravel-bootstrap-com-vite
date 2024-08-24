<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Template</title>

    <link rel="stylesheet" href="{{ asset('build/assets/app-5f3ded15.css') }}">
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
</head>
<body>

    <div class="container">

        @yield('content')

    </div>

    <script src="{{ asset('build/assets/app-ba970431.js') }}"></script>
</body>
</html>
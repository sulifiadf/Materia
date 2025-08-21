<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Materia' }}</title>
        <!-- Font Awesome 6 -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

        @vite([
            'resources/css/app.css',
            'resources/js/app.js',
            ])
            @livewireStyles
    </head>
    <body class="">
        <main>
        @livewire('partials.navbar')
        {{ $slot }}
        </main>
        @livewire('partials.footer')
        @livewireScripts
    </body>
</html>

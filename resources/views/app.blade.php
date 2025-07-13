<!DOCTYPE html>
<html
    lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    class="h-full bg-zinc-200"
>
<head>
    <meta charset="utf-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <title>Laravel</title>

    <!-- Fonts -->
    <link
        rel="preconnect"
        href="https://fonts.bunny.net"
    >
    <link
        href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600"
        rel="stylesheet"
    />

    <!-- Styles / Scripts -->
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="h-full bg-zinc-200 text-zinc-800">
<div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
{{--    <p class="text-zinc-500">Logged In As: {{ auth()->users()->full_name }}</p>--}}
    <div class="mt-4">
        @yield("content")</div>
</div>

@persist("toast")
<flux:toast />
@endpersist
@livewireScripts
@fluxScripts
</body>
</html>

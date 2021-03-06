<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @if(isset($title))
        <title>{{ $title }} - {{ config('app.name', 'Fjesbok DEV') }}</title>
    @else
        <title>{{ config('app.name', 'Fjesbok DEV') }}</title>
    @endif

    <link rel="shortcut icon" type="image/jpg" href="{{ asset('/img/fjesbok-logo.png') }}"/>

    <!-- Fonts -->
    {{--    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">--}}

<!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @livewireStyles

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    @stack('header-scripts')

</head>
<body class="font-sans antialiased">
<div class="bg-gray-200">
@include('layouts.navigation')

<!-- Page Heading -->
    @if(isset($header))
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold text-gray-900">
                    {{ $header }}
                </h1>
            </div>
        </header>
@endif

{{--<!-- Flash Content -->--}}
{{--    @include('layouts._errors')--}}

<!-- Page Content -->
    <main>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('flash::message')

            {{ $slot }}
        </div>
    </main>

@include('layouts.footer')
</div>

@livewireScripts

</body>
</html>

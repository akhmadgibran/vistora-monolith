<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Vistora</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    {{-- Navbar --}}
    @include($navbarView)

    {{-- Main Content --}}
    <main>
        @include('layouts.flash-message.flash-message')

        @guest
            {{-- @include('layouts.shop-status-flash-message') --}}
        @else
            @if (Auth::user()->hasRole('customer'))
                {{-- @include('layouts.shop-status-flash-message') --}}
            @endif
        @endguest

        @yield('content')
    </main>

    {{-- Footer --}}
    @include($footerView)

</body>
</html>

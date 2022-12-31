<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    @include('layouts.head')

    <body class="bg-white">

        @include('layouts.navigation')

        @yield('content')
    </body>

</html>

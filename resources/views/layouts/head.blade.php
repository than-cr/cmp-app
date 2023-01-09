<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{config('app.name', 'CMP')}}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- Scripts -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/common.js',
            'resources/js/services/services.js', 'resources/js/services/navigation.js', 'resources/js/services/role.js',
            'resources/js/services/live.js', 'resources/js/services/dashboard.js', 'resources/js/services/user.js'])

    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>

</head>

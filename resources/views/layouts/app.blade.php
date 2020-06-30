<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#F7D90B" />
    <title>mStore : Classifieds website portal</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,800,800i,900,900i"
        rel="stylesheet">
{{--
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
        integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"> --}}

     <!-- Scripts -->
    <script src="{{ mix('/js/app.js') }}" defer></script>


    <!-- Scripts -->
    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>


    @if(!auth()->guest())
        <script>
            window.Laravel.userId = <?php echo auth()->user()->id; ?>
        </script>
    @endif

    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    @stack('scripts')


</head>

<body class="font-sans h-full bg-gray-200  leading-normal tracking-normal antialiased">

    <div>
        @yield('nav')
        @yield('search')
        @yield('mstorehome')
        @yield('businesstype')
        @yield('content')
        @yield('footer')
    </div>

    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous"
        src="https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v7.0&appId=662144831184109&autoLogAppEvents=1"
        nonce="OPzYkWDH">
    </script>
</body>

</html>

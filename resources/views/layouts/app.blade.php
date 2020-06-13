<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#F7D90B" />
    <title>mStore : Classifieds website portal</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,800,800i,900,900i"
        rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
        integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css" rel="stylesheet">
    <!-- Scripts -->
    <script src="{{ mix('/js/app.js') }}" defer></script>


    <!-- // Google analytics. // -->
    <!-- Global site tag (gtag.js) - Google Analytics -->

    {{-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-1074154-29"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-1074154-29');
    </script>
    <script data-ad-client="ca-pub-5073377677831929" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> --}}

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
    </script>

    <!-- This makes the current user's id available in javascript -->
    @if(!auth()->guest())
    <script>
        window.Laravel.userId = <?php echo auth()->user()->id; ?>
    </script>
    @endif

    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    @stack('scripts')
    <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v7.0&appId=662144831184109&autoLogAppEvents=1">
        </script>
</head>

<body class="font-sans h-full bg-gray-100  leading-normal tracking-normal antialiased">
    <div>
        @yield('nav')
        @yield('search')
        @yield('mstorehome')
        @yield('businesstype')
        @yield('content')
        @yield('footer')
    </div>
</body>

</html>

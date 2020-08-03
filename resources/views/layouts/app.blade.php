<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#4299E1" />
    <title>mStore : Classifieds website portal</title>
    @yield('ogmeta')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,800,800i,900,900i"
        rel="stylesheet">

        <script src="{{ mix('/js/app.js') }}" defer></script>
        @if (App::environment('production', 'staging'))
            <script>
                if ('serviceWorker' in navigator) {
                    window.addEventListener('load', function() {
                        navigator.serviceWorker.register('/sw.js').then(function(registration) {
                        // Registration was successful
                        console.log('ServiceWorker registration successful with scope: ', registration.scope);
                        }, function(err) {
                        // registration failed :(
                        console.log('ServiceWorker registration failed: ', err);
                        });
                    });
                    }
            </script>
        @endif


        <link rel ="manifest" href ="/manifest.json">


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

    <script data-ad-client="ca-pub-5073377677831929" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-1074154-29"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-1074154-29');
    </script>

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

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v7.0&appId=662144831184109&autoLogAppEvents=1" nonce="iDG8qok2"></script>


 </body>

</html>

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

    <script src="https://www.gstatic.com/firebasejs/7.15.5/firebase-app.js"></script>


    <script src="https://www.gstatic.com/firebasejs/7.15.5/firebase-analytics.js"></script>

    <script>

    var firebaseConfig = {
        apiKey: "AIzaSyD1571LEF9PjmRR26I_3_fcOKZu_w7Pxo4",
        authDomain: "mstore-6780b.firebaseapp.com",
        databaseURL: "https://mstore-6780b.firebaseio.com",
        projectId: "mstore-6780b",
        storageBucket: "mstore-6780b.appspot.com",
        messagingSenderId: "199619813635",
        appId: "1:199619813635:web:f6400c27942aa57dfd4936",
        measurementId: "G-PSYBW6QEYB"
    };

    firebase.initializeApp(firebaseConfig);
    firebase.analytics();
    </script>
 </body>

</html>

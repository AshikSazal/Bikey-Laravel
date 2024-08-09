<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="./images/logo.png" type="image/png">
    <link rel="stylesheet" href="./src/css/loading.css">
    {{-- <script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script> --}}
    <script type="text/javascript" src="{{ URL::to('src/js/firebase.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('src/js/jquery.js') }}"></script>
    @vite(['resources/css/app.css', 'resources/css/header.css', 'resources/css/chat.css', 'resources/css/landing-page.css', 'resources/css/input.css','resources/js/app.js'])
    <script>
        {!! Vite::content('resources/js/app.js') !!}
    </script>
    <script src="{{asset('src/js/chat.js')}}"></script>
    <script>
        var sender_id = @json(Auth::guard('user')->check() ? Auth::guard('user')->user()->id : (Auth::guard('admin')->check() ? Auth::guard('admin')->user()->id : null));
        var receiver_id;
    </script>
    <title>Bikey</title>
</head>

<body>
    {{-- until fully loaded the page loading spinner will show --}}
    <x-loading />

    @include('header-footer.header')
    @include('features.chat.chat')
    @yield('content')
    @include('header-footer.footer')

    <script>
        // until fully loaded the page loading spinner will show
        document.onreadystatechange = function() {
            if (document.readyState !== "complete") {
                document.querySelector("body").style.overflow = 'hidden';
                document.querySelector("#loading-container").style.display = "flex";
            } else {
                document.querySelector("#loading-container").style.display = "none";
                document.querySelector("body").style.overflow = "";
            }
        };
    </script>
    @yield('scripts')
    @stack('pop-up-close-scripts')
    
</body>

</html>

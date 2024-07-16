<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
    <link rel="icon" href="./images/logo.png" type="image/png">
    <link rel="stylesheet" href="./src/css/loading.css">
    @vite(['resources/css/app.css','resources/css/header.css','resources/css/chat.css','resources/css/landing-page.css','resources/css/input.css'])
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
        document.onreadystatechange = function () {
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
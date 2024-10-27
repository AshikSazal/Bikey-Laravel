<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="./images/logo.png" type="image/png">
    <link rel="stylesheet" href="./src/css/loading.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script type="text/javascript" src="{{ URL::to('src/js/firebase.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('src/js/jquery.js') }}"></script>
    @vite(['resources/css/app.css', 'resources/css/header.css', 'resources/css/chat.css', 'resources/css/landing-page.css', 'resources/css/input.css','resources/js/app.js'])
    <script>
        {!! Vite::content('resources/js/app.js') !!}
    </script>
    <script src="{{asset('src/js/chat.js')}}"></script>
    <script>
        var sender_id = @json(Auth::guard('user')->check() ? Auth::guard('user')->user()->id : (Auth::guard('admin')->check() ? Auth::guard('admin')->user()->id : null));
        var receiver_id=99999;
        var messageSize;
    </script>
    <title>Bikey</title>
</head>

<body>
    {{-- until fully loaded the page loading spinner will show --}}
    <x-loading />

    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-md h-screen relative">
            <div class="p-6">
                <h1 class="text-2xl font-bold">ADMIN PANEL</h1>
                <nav class="mt-6">
                    <ul>
                        <li>
                            <a href="#" class="flex items-center py-2 px-4 text-gray-700 hover:bg-gray-200">
                                <i class="fas fa-tachometer-alt mr-2"></i> DASHBOARD
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.chat')}}" class="flex items-center py-2 px-4 text-gray-700 hover:bg-gray-200">
                                <i class="fas fa-users mr-2"></i> CHATS
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center py-2 px-4 text-gray-700 hover:bg-gray-200">
                                <i class="fas fa-cog mr-2"></i> SETTINGS
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center py-2 px-4 text-gray-700 hover:bg-gray-200">
                                <i class="fas fa-chart-line mr-2"></i> REPORTS
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="absolute bottom-0 left-0 w-full p-6">
                <a href="#" class="block w-full text-center bg-blue-600 text-white py-2 rounded hover:bg-blue-500">Login</a>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            @yield('content')
        </main>
    </div>

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

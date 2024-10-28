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
                <a id="pop-logout" href="{{ route('admin.logout') }}" class="relative flex items-center justify-center text-sky_blue_color bg-white border-2 border-sky_blue_color py-3 space-x-3 rounded-full overflow-hidden group">
                    <span class="absolute inset-0 bg-sky_blue_color transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 ease-in-out origin-center"></span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="h-6 relative z-10 transition-colors duration-500 ease-in-out group-hover:text-white">
                        <path fill="currentColor" d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464H398.7c-8.9-63.3-63.3-112-129-112H178.3c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3z" />
                    </svg>
                    <span class="relative z-10 text-lg transition-colors duration-500 ease-in-out group-hover:text-white">LOGOUT</span>
                </a>
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

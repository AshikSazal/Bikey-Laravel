<header>
    <nav class="grid grid-cols-3 p-4 shadow">
        <div class="flex items-center"><img src="./images/logo.png" alt="" height="150" width="150"></div>
        <div class="grid grid-cols-4 gap-2 items-center">
            <div class="text-2xl hover:text-nav_color hover:underline"><a href="#">Home</a></div>
            <div class="text-2xl hover:text-nav_color hover:underline"><a href="#">Brand</a></div>
            <div class="text-2xl hover:text-nav_color hover:underline"><a href="#">About</a></div>
            <div class="text-2xl hover:text-nav_color hover:underline"><a href="#">Contact</a></div>
        </div>
        <div class="grid grid-cols-2">
            <a href="#" class="flex items-center justify-end relative">
                {{-- <a href=""><img src="./images/cart.png" alt="" height="60" width="60"></a> --}}
                <svg height="50" width="50" xmlns="http://www.w3.org/2000/svg" fill="#1ca3e4" viewBox="0 0 576 512"><path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/></svg>
                <span class="absolute text-xl text-white top-0 transform translate-x-2/3 -translate-y-1/3 bg-[#f85606] px-2 rounded-full">0</span>
            </a>            
            <div class="flex items-center justify-center">
                <a href="./login" class="flex items-center text-white bg-nav_color px-8 py-3 space-x-3 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="h-6">
                        <path fill="currentColor" d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464H398.7c-8.9-63.3-63.3-112-129-112H178.3c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3z" />
                    </svg>
                    <span class="text-lg">Login</span>
                </a>
            </div>
        </div>
    </nav>
    <hr class="border-0 h-px bg-slate-300">
</header>

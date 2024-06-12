<header>
    <nav class="grid grid-cols-5 md:grid-cols-5 p-4 shadow fixed overflow-hidden w-full z-10">
        <div class="flex items-center col-span-2 md:col-span-1"><img src="./images/logo.png" alt="" height="150" width="150"></div>
        <div class="ms:hidden md:grid md:grid-cols-4 gap-2 items-center relative md:col-span-2">
            @include('components.landing-page.nav', ['text' => 'Home', 'href' => '#','flag'=>1])
            @include('components.landing-page.nav', ['text' => 'Brand', 'href' => '#','flag'=>1])
            @include('components.landing-page.nav', ['text' => 'About', 'href' => '#','flag'=>1])
            @include('components.landing-page.nav', ['text' => 'Contact', 'href' => '#','flag'=>1])
        </div>
        
        <div class="col-span-2 grid grid-cols-2 md:col-span-2">
            <div class="flex relative items-center lg:justify-end sm:justify-center justify-end">
                <a href="#" class="">
                    <svg height="40" width="40" xmlns="http://www.w3.org/2000/svg" fill="#1ca3e4" viewBox="0 0 576 512"><path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/></svg>
                    <span class="absolute text-lg text-white top-0 transform translate-x-8 -translate-y-1/4 bg-[#f85606] px-2 rounded-full">0</span>
                </a>
            </div>
            <div class="ms:hidden md:flex md:justify-end lg:justify-center sm:justify-start">
                <a href="./login" class="relative flex items-center text-white bg-nav_color border-2 border-nav_color px-8 py-3 space-x-3 rounded-full overflow-hidden group">
                    <span class="absolute inset-0 bg-white transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 ease-in-out origin-center"></span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="h-6 relative z-10 transition-colors duration-500 ease-in-out group-hover:text-nav_color">
                        <path fill="currentColor" d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464H398.7c-8.9-63.3-63.3-112-129-112H178.3c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3z" />
                    </svg>
                    <span class="relative z-10 text-lg transition-colors duration-500 ease-in-out group-hover:text-nav_color">Login</span>
                </a>
            </div>          
        </div>
        <div class="md:hidden col-span-1 flex justify-center md:justify-end items-center">
            <button class="list-header">
                <svg height="40" width="40" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"/></svg>
            </button>
        </div>
    </nav>
    <hr class="border-0 h-px bg-slate-300">
    <div class="navbar-list absolute flex justify-center items-center z-20">
        <ul class="box-list">
            <li class="nav-close flex justify-end">
                <button class="border-4 border-nav_color rounded-full mb-2"><svg height="40" width="40" class="text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="currentColor" d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg></button>
            </li>
            <li class="bg-nav_color">
                @include('components.landing-page.nav', ['text' => 'Home', 'href' => '#','flag'=>2])
            </li>
            <li class="bg-nav_color">
                @include('components.landing-page.nav', ['text' => 'Brand', 'href' => '#','flag'=>2])
            </li>
            <li class="bg-nav_color">
                @include('components.landing-page.nav', ['text' => 'About', 'href' => '#','flag'=>2])
            </li>
            <li class="bg-nav_color">
                @include('components.landing-page.nav', ['text' => 'Contact', 'href' => '#','flag'=>2])
            </li>
            <li>
                <a href="./login" class="relative mt-4 flex items-center justify-center text-nav_color bg-white border-2 border-nav_color py-3 space-x-3 rounded-full overflow-hidden group">
                    <span class="absolute inset-0 bg-nav_color transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 ease-in-out origin-center"></span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="h-6 relative z-10 transition-colors duration-500 ease-in-out group-hover:text-white">
                        <path fill="currentColor" d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464H398.7c-8.9-63.3-63.3-112-129-112H178.3c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3z" />
                    </svg>
                    <span class="relative z-10 text-lg transition-colors duration-500 ease-in-out group-hover:text-white">Login</span>
                </a>
            </li>
        </ul>
    </div>        
</header>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const navList = document.querySelector('.navbar-list');
        const navClose = document.querySelector('.nav-close');
        const listHeader = document.querySelector('.list-header');
        const listItems = document.querySelectorAll('.box-list li');
        let menuOpen = false;
        
        listHeader.addEventListener('click', function() {
            if (window.innerWidth <= 1060) {
                if (!menuOpen) {
                    navList.style.height = '100%';
                    navList.style.width = '100%';
                    document.body.style.overflow = 'hidden';
                    document.body.style.background = 'rgba(0, 0, 0, 0.5)';
                    listItems.forEach(function(item, index) {
                        item.style.transition = `transform 0.2s linear ${index * 0.2}s`;
                        item.style.transform = 'perspective(350px) rotateX(0deg)';
                    });
                    menuOpen = true;
                } else {
                    document.body.style.overflow = '';
                    document.body.style.background = '';

                    // This is for animation
                    /*listItems.forEach(function(item, index) {
                        const reverseIndex = listItems.length - index - 1;
                        item.style.transition = `transform 0.2s linear ${reverseIndex * 0.2}s`;
                        item.style.transform = 'perspective(350px) rotateX(-90deg)';
                    });)*/

                    // This is not for animation
                    listItems.forEach(function(item, index) {
                        item.style.transition = '';
                        item.style.transform = '';
                    });
                    navList.style.height = '';
                    navList.style.width = '';
                    menuOpen = false;
                }
            }
        });

        // Window close on close button
        navClose.addEventListener('click', function(e) {
            document.body.style.overflow = '';
                document.body.style.background = '';

                // This is for animation
                /*listItems.forEach(function(item, index) {
                    const reverseIndex = listItems.length - index - 1;
                    item.style.transition = `transform 0.2s linear ${reverseIndex * 0.2}s`;
                    item.style.transform = 'perspective(350px) rotateX(-90deg)';
                });*/

                // This is not for animation
                listItems.forEach(function(item, index) {
                    item.style.transition = '';
                    item.style.transform = '';
                });
                navList.style.height = '';
                navList.style.width = '';
                menuOpen = false;
        });

        // Window close for outside click of the menu
        window.addEventListener('click', function(e) {
            if(e.target==navList){
                document.body.style.overflow = '';
                document.body.style.background = '';

                // This is for animation
                /*listItems.forEach(function(item, index) {
                    const reverseIndex = listItems.length - index - 1;
                    item.style.transition = `transform 0.2s linear ${reverseIndex * 0.2}s`;
                    item.style.transform = 'perspective(350px) rotateX(-90deg)';
                });*/

                // This is not for animation
                
                listItems.forEach(function(item, index) {
                    item.style.transition = '';
                    item.style.transform = '';
                });
                navList.style.height = '';
                navList.style.width = '';
                menuOpen = false;
            }
        });

        // more than 1060 size window menu will automatically closed
        window.addEventListener('resize', function() {
            if (window.innerWidth >= 1060 && menuOpen) {
                document.body.style.overflow = '';
                document.body.style.background = '';

                // This is for animation
                /*listItems.forEach(function(item, index) {
                    const reverseIndex = listItems.length - index - 1;
                    item.style.transition = `transform 0.2s linear ${reverseIndex * 0.2}s`;
                    item.style.transform = 'perspective(350px) rotateX(-90deg)';
                });*/

                // This is not for animation
                listItems.forEach(function(item, index) {
                    item.style.transition = '';
                    item.style.transform = '';
                });
                navList.style.height = '';
                navList.style.width = '';
                menuOpen = false;
            }
        });
    });
</script>
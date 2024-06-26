@extends('app')

@section('content')
    <div class="my-[89px]">
        <div class="relative inline-block align-middle">
            <img class="block" src="./images/honda.jpg" alt="Honda">
            <div class="absolute inset-0 flex items-center justify-center">
                <h1 id="typewriter" class="relative typewriter text-white text-sm sm:text-2xl md:text-3xl lg:text-3xl xl:text-3xl">Lorem ipsum dolor sit amet consectetur.</h1>
            </div>
        </div>
        <div class="grid sm:grid-cols-2">
            <div class="col-span-1 flex items-center">
                <div class="p-10 bg-nav_color flex flex-col justify-center h-full">
                    <span class="uppercase text-white"><b>Lorem ipsum dolor sit</b></span>
                    <p class="text-gray-200">Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta nemo corrupti molestiae iste quia eos totam recusandae voluptatum quidem rerum nobis.</p>
                </div>
            </div>
            <div class="col-span-1 flex items-center justify-center">
                <img src="./images/bike-1.jpg" alt="">
            </div>
        </div>        
        <div class="grid sm:grid-cols-2">
            <div class="col-span-1 hidden sm:block">
                <img src="./images/bike-2.jpg" alt="">
            </div>
            <div class=" col-span-1 flex items-center">
                <div class="p-10 bg-cart_count_color flex flex-col justify-center h-full">
                    <span class="uppercase text-white"><b>Lorem ipsum dolor sit</b></span>
                    <span class="text-gray-200"><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta nemo corrupti molestiae iste quia eos totam recusandae voluptatum quidem rerum nobis.</p></span>
                </div>
            </div>
            <div class="col-span-1 sm:hidden">
                <img src="./images/bike-2.jpg" alt="">
            </div>
        </div>
        <div class="grid sm:grid-cols-2">
            <div class="col-span-1 flex items-center">
                <div class="bg-nav_color p-10 flex flex-col justify-center h-full">
                    <span class="uppercase text-white"><b>Lorem ipsum dolor sit</b></span>
                    <span class="text-gray-200"><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta nemo corrupti molestiae iste quia eos totam recusandae voluptatum quidem rerum nobis.</p></span>
                </div>
            </div>
            <div class="col-span-1">
                <img src="./images/bike-3.jpg" alt="">
            </div>
        </div>
        <div class="grid grid-cols-3 p-20 bg-box_bg gap-x-10">
            <div class="col-span-1 bg-[#ADDEF5] shadow-box_shadow rounded-md p-10">
                <div class="flex justify-center"><h1><svg fill="#f85606" xmlns="http://www.w3.org/2000/svg" height="60" width="60" viewBox="0 0 640 512"><path d="M112 0C85.5 0 64 21.5 64 48V96H16c-8.8 0-16 7.2-16 16s7.2 16 16 16H64 272c8.8 0 16 7.2 16 16s-7.2 16-16 16H64 48c-8.8 0-16 7.2-16 16s7.2 16 16 16H64 240c8.8 0 16 7.2 16 16s-7.2 16-16 16H64 16c-8.8 0-16 7.2-16 16s7.2 16 16 16H64 208c8.8 0 16 7.2 16 16s-7.2 16-16 16H64V416c0 53 43 96 96 96s96-43 96-96H384c0 53 43 96 96 96s96-43 96-96h32c17.7 0 32-14.3 32-32s-14.3-32-32-32V288 256 237.3c0-17-6.7-33.3-18.7-45.3L512 114.7c-12-12-28.3-18.7-45.3-18.7H416V48c0-26.5-21.5-48-48-48H112zM544 237.3V256H416V160h50.7L544 237.3zM160 368a48 48 0 1 1 0 96 48 48 0 1 1 0-96zm272 48a48 48 0 1 1 96 0 48 48 0 1 1 -96 0z"/></svg></h1></div>
                <div class="text-justify mt-10">
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Minima deserunt consequatur nihil eligendi quod maxime odio neque tempore unde explicabo natus blanditiis corporis voluptatibus quaerat, repellendus rem quibusdam ullam vitae.
                        Quas error nemo, atque rem tempora perspiciatis est nulla sed impedit, omnis officia itaque voluptas voluptatibus aliquam consequuntur.
                    </p>
                </div>
            </div>
            <div class="col-span-1 bg-[#ADDEF5] shadow-box_shadow rounded-md p-10">
                <div class="flex justify-center"><h1><svg fill="#f85606" xmlns="http://www.w3.org/2000/svg" height="60" width="60" viewBox="0 0 512 512"><path d="M256 48C141.1 48 48 141.1 48 256v40c0 13.3-10.7 24-24 24s-24-10.7-24-24V256C0 114.6 114.6 0 256 0S512 114.6 512 256V400.1c0 48.6-39.4 88-88.1 88L313.6 488c-8.3 14.3-23.8 24-41.6 24H240c-26.5 0-48-21.5-48-48s21.5-48 48-48h32c17.8 0 33.3 9.7 41.6 24l110.4 .1c22.1 0 40-17.9 40-40V256c0-114.9-93.1-208-208-208zM144 208h16c17.7 0 32 14.3 32 32V352c0 17.7-14.3 32-32 32H144c-35.3 0-64-28.7-64-64V272c0-35.3 28.7-64 64-64zm224 0c35.3 0 64 28.7 64 64v48c0 35.3-28.7 64-64 64H352c-17.7 0-32-14.3-32-32V240c0-17.7 14.3-32 32-32h16z"/></svg></h1></div>
                <div class="text-justify mt-10">
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Minima deserunt consequatur nihil eligendi quod maxime odio neque tempore unde explicabo natus blanditiis corporis voluptatibus quaerat, repellendus rem quibusdam ullam vitae.
                        Quas error nemo, atque rem tempora perspiciatis est nulla sed impedit, omnis officia itaque voluptas voluptatibus aliquam consequuntur.
                    </p>
                </div>
            </div>
            <div class="col-span-1 bg-[#ADDEF5] shadow-box_shadow rounded-md p-10">
                <div class="flex justify-center"><h1><svg fill="#f85606" xmlns="http://www.w3.org/2000/svg" height="60" width="60" viewBox="0 0 640 512"><path d="M323.4 85.2l-96.8 78.4c-16.1 13-19.2 36.4-7 53.1c12.9 17.8 38 21.3 55.3 7.8l99.3-77.2c7-5.4 17-4.2 22.5 2.8s4.2 17-2.8 22.5l-20.9 16.2L512 316.8V128h-.7l-3.9-2.5L434.8 79c-15.3-9.8-33.2-15-51.4-15c-21.8 0-43 7.5-60 21.2zm22.8 124.4l-51.7 40.2C263 274.4 217.3 268 193.7 235.6c-22.2-30.5-16.6-73.1 12.7-96.8l83.2-67.3c-11.6-4.9-24.1-7.4-36.8-7.4C234 64 215.7 69.6 200 80l-72 48V352h28.2l91.4 83.4c19.6 17.9 49.9 16.5 67.8-3.1c5.5-6.1 9.2-13.2 11.1-20.6l17 15.6c19.5 17.9 49.9 16.6 67.8-2.9c4.5-4.9 7.8-10.6 9.9-16.5c19.4 13 45.8 10.3 62.1-7.5c17.9-19.5 16.6-49.9-2.9-67.8l-134.2-123zM16 128c-8.8 0-16 7.2-16 16V352c0 17.7 14.3 32 32 32H64c17.7 0 32-14.3 32-32V128H16zM48 320a16 16 0 1 1 0 32 16 16 0 1 1 0-32zM544 128V352c0 17.7 14.3 32 32 32h32c17.7 0 32-14.3 32-32V144c0-8.8-7.2-16-16-16H544zm32 208a16 16 0 1 1 32 0 16 16 0 1 1 -32 0z"/></svg></h1></div>
                <div class="text-justify mt-10">
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Minima deserunt consequatur nihil eligendi quod maxime odio neque tempore unde explicabo natus blanditiis corporis voluptatibus quaerat, repellendus rem quibusdam ullam vitae.
                        Quas error nemo, atque rem tempora perspiciatis est nulla sed impedit, omnis officia itaque voluptas voluptatibus aliquam consequuntur.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection


<script>
    document.addEventListener("DOMContentLoaded", function() {
        const typewriter = document.getElementById('typewriter');
        const text = typewriter.innerText;
        let index = 0;
        let isDeleting = false;

        function type() {
            if (isDeleting) {
                if (index > 0) {
                    typewriter.innerText = text.substring(0, index - 1);
                    index--;
                } else {
                    isDeleting = false;
                }
            } else {
                if (index < text.length) {
                    typewriter.innerText = text.substring(0, index + 1);
                    index++;
                } else {
                    isDeleting = true;
                }
            }
        }

        setInterval(type, 100);
    });

</script>
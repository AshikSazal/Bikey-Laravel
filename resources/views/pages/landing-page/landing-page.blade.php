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
        <div class="grid grid-cols-3">
            <div class="col-span-1"></div>
            <div class="col-span-1"></div>
            <div class="col-span-1"></div>
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
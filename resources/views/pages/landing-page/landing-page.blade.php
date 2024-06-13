@extends('app')

@section('content')
    <div class="">
        <div class="relative inline-block align-middle">
            <img class="block opacity-50 w-full h-auto" src="./images/honda.jpg" alt="Honda">
            <div class="absolute inset-0 flex items-center justify-center">
                <h1 id="typewriter" class="relative typewriter text-white text-sm sm:text-2xl md:text-3xl lg:text-4xl xl:text-4xl 2xl:text-6xl">Lorem ipsum dolor sit amet consectetur.</h1>
            </div>
        </div>
    </div>
@endsection


<script>
    document.addEventListener("DOMContentLoaded", function() {
        const element = document.getElementById('typewriter');
        const text = element.innerText;
        let index = 0;
        let isDeleting = false;

        function type() {
            if (isDeleting) {
                if (index > 0) {
                    element.innerText = text.substring(0, index - 1);
                    index--;
                } else {
                    isDeleting = false;
                }
            } else {
                if (index < text.length) {
                    element.innerText = text.substring(0, index + 1);
                    index++;
                } else {
                    isDeleting = true;
                }
            }
        }

        setInterval(type, 100);
    });

</script>
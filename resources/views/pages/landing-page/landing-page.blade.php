@extends('app')

@section('content')
    <div class="">
        <div class="relative inline-block align-middle">
            <img class="block opacity-50" src="./images/honda.jpg" alt="Honda">
            <div class="absolute inset-0 flex items-center justify-center">
                <h1 id="typewriter" class="relative typewriter text-white text-sm sm:text-2xl md:text-3xl lg:text-3xl xl:text-3xl">Lorem ipsum dolor sit amet consectetur.</h1>
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
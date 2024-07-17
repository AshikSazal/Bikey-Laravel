<div id="open-pop-up" class="hidden fixed top-0 left-0 w-full h-full justify-center items-center">
    <div class="bg-white rounded-lg w-[400px] min-h-60 px-4 pt-4 pb-6">
        <div class="flex justify-between px-4 pt-2" id="close-pop-up">
            <h1 class="text-3xl text-orange_color">Error</h1>
            <button class="focus:outline-none">
                <svg height="30" width="30" class="text-orange_color" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>
        <div class="px-8">
            <hr class="my-4 border-sky_blue_color border-[1px]">
            <h3 id="show-error-message" class="text-black text-justify text-2xl"></h3>
        </div>
    </div>
</div>

@push('pop-up-close-scripts')
    <script>
        document.addEventListener("DOMContentLoaded",function(){
            const closePopUp = document.getElementById('close-pop-up');
            const openPopUp = document.getElementById('open-pop-up');
            closePopUp.addEventListener('click',function(){
                openPopUp.style.display = "none";
                openPopUp.classList.remove("z-20","bg-black", "bg-opacity-80");
                openPopUp.classList.add("-z-20");
                document.body.style.overflow = '';
            });
        })
    </script>
@endpush
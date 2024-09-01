<div class="place-items-center bg-sky_blue_color justify-evenly grid grid-cols-2 py-4">
    <div class="flex flex-row items-center col-span-1 space-x-4">
        <h1 id="bike-category" class="text-2xl font-bold bg-dark_blue_color text-white px-4 py-2 rounded cursor-pointer hover:underline hover:bg-white hover:text-sky_blue_color" data-category="all">
            ALL
        </h1>
        <h1 id="bike-category" class="text-2xl font-bold bg-dark_blue_color text-white px-4 py-2 rounded cursor-pointer hover:underline hover:bg-white hover:text-sky_blue_color" data-category="bike">
            BIKE
        </h1>
        <h1 id="accessories-category" class="text-2xl font-bold bg-dark_blue_color text-white px-4 py-2 rounded cursor-pointer hover:underline hover:bg-white hover:text-sky_blue_color" data-category="accessories">
            ACCESSORIES
        </h1>
    </div>
    <div class="col-span-1 relative w-full mr-8 rounded-full">
        <form action="" id="search-form" class="">
            <input type="text" name="search" value="{{request('search')}}" placeholder="Search" class="border rounded-full pr-12 focus:outline-none block w-full p-2.5" />
            <button class="absolute right-0 top-1/2 transform -translate-y-1/2 text-white px-4 py-2 rounded">
                <svg fill="#1ca3e4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-6 h-6"><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg>
            </button>
        </form>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        $('#search-form').on('keyup change', 'input', function() {
            console.log('hello');
        });
    });
</script>
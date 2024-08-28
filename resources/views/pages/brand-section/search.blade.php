<div class="place-items-center bg-sky_blue_color justify-evenly grid grid-cols-2 py-4">
    <div class="flex flex-row items-center col-span-1 space-x-4">
        <h1 class="text-2xl font-bold bg-dark_blue_color text-white px-4 py-2 rounded">BIKE</h1>
        <h1 class="text-2xl font-bold bg-dark_blue_color text-white px-4 py-2 rounded">ACCESSORIES</h1>
    </div>
    <div class="col-span-1 w-full">
        <form action="" id="search-form">
            <x-input type="text" name="search" placeholder="Search" class="border p-2 rounded" />
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
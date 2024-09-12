<div class="place-items-center bg-sky_blue_color justify-evenly grid grid-cols-4 sm:grid-cols-2 py-4">
    <div class="flex flex-row items-center sm:col-span-1 space-x-4 col-span-3">
        <h1 id="bike-category" class="text-2xl font-bold bg-dark_blue_color text-white px-4 py-2 rounded cursor-pointer hover:underline hover:bg-white hover:text-sky_blue_color category" data-category="all">
            ALL
        </h1>
        <h1 id="bike-category" class="text-2xl font-bold bg-dark_blue_color text-white px-4 py-2 rounded cursor-pointer hover:underline hover:bg-white hover:text-sky_blue_color category" data-category="bike">
            BIKE
        </h1>
        <h1 id="accessories-category" class="text-2xl font-bold bg-dark_blue_color text-white px-4 py-2 rounded cursor-pointer hover:underline hover:bg-white hover:text-sky_blue_color category" data-category="parts">
            ACCESSORIES
        </h1>
    </div>
    <div class="col-span-1 relative sm:block md:w-full hidden md:mr-8 sm:mr-2 rounded-full">
        <form action="" id="search-form" class="">
            <input id="search-product" type="text" name="search" value="{{request('search')}}" placeholder="Search" class="border rounded-full pr-12 focus:outline-none block w-full p-2.5" />
            <button class="absolute right-0 top-1/2 transform -translate-y-1/2 text-white px-4 py-2 rounded">
                <svg fill="#1ca3e4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-6 h-6"><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg>
            </button>
            <div style="scrollbar-width: none;" class="absolute bg-gray-300 w-full rounded-md overflow-hidden mt-2 z-10 max-h-48 overflow-y-auto" id="search-product-result">
                <ul id=""></ul>
            </div>
        </form>
    </div>
    <div class="sm:hidden block col-span-1 relative rounded-full w-full">
        <form action="" id="search-form2" class="">
            <input id="search-field" type="text" name="search" value="{{request('search')}}" placeholder="Search" class="border-[3px] rounded-lg top-10 absolute focus:outline-none border-orange_color right-0 p-2.5 md:w-[320px] w-[250px] hidden" />
        </form>
        <button id="search-field-open" class="absolute right-0 top-1/2 transform -translate-y-1/2 text-white px-2 py-2 rounded">
            <svg id="search-open-icon" fill="#fff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-6 h-6"><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg>
            <svg id="search-close-icon" fill="#fff" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 hidden" viewBox="0 0 384 512"><path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg>
        </button>
        <div style="scrollbar-width: none;" class="absolute bg-gray-300 md:w-[320px] w-[250px] rounded-md overflow-hidden mt-24 right-0 max-h-48 overflow-y-auto" id="search-product-result2">
            <ul id=""></ul>
        </div>
    </div>
    <x-error />
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        let products=[];
        const showError = document.getElementById('open-pop-up');
        const categories = document.querySelectorAll(".category");
        function fetchAllProducts(){
            $.ajax({
                headers: {'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')},
                type: "GET",
                url: "/get-all-product",
                success: function(res){
                    products = res.products;
                },
                error: function(xhr, status, error){
                    loading.style.display="none";
                    // document.body.style.overflow = '';
                    
                    showError.style.display = "flex";
                    showError.classList.add("z-20","bg-black", "bg-opacity-80");
                    document.body.style.overflow = 'hidden';
                    $('#show-error-message').text(xhr.responseJSON.error);
                    $("#show-error-message").show();
                }
            });
        }

        // Function to calculate the Levenshtein distance
        function levenshtein(a, b) {
            const alen = a.length;
            const blen = b.length;
            const matrix = [];

            // Create matrix
            for (let i = 0; i <= alen; i++) {
                matrix[i] = [i];
            }
            for (let j = 0; j <= blen; j++) {
                matrix[0][j] = j;
            }

            // Populate matrix
            for (let i = 1; i <= alen; i++) {
                for (let j = 1; j <= blen; j++) {
                    const cost = a[i - 1] === b[j - 1] ? 0 : 1;
                    matrix[i][j] = Math.min(
                        matrix[i - 1][j] + 1,    // Deletion
                        matrix[i][j - 1] + 1,    // Insertion
                        matrix[i - 1][j - 1] + cost // Substitution
                    );
                }
            }

            return matrix[alen][blen];
        }

        // Function to calculate similarity percentage
        function similarityPercentage(a, b) {
            const distance = levenshtein(a, b);
            const maxLen = Math.max(a.length, b.length);
            return Math.round((1 - distance / maxLen) * 100);
        }

        function showProduct(search, resultContainer){
            // Clear previous results
            resultContainer.find('ul').remove();

            if (search.length === 0) {
                return;
            }

            // Create a new <ul> container
            const ul = $('<ul></ul>');
            resultContainer.append(ul);

            const similarityMap = {};
            products.forEach(product => {
                const similarity = similarityPercentage(search, product.name);
                if (similarity > 0) {
                    if (!similarityMap[similarity]) {
                        similarityMap[similarity] = [];
                    }
                    similarityMap[similarity].push(product);
                }
            });

            // Filter and sort entries by similarity
            const threshold = 30;
            const sortedEntries = Object.entries(similarityMap)
                .filter(([similarity]) => parseFloat(similarity) >= threshold)
                .sort(([similarityA], [similarityB]) => parseFloat(similarityB) - parseFloat(similarityA));

            // Flatten sorted entries into a single products array
            const sortedProducts = sortedEntries.reduce((acc, [, products]) => {
                return acc.concat(products);
            }, []);

            if (sortedProducts.length > 0) {
                sortedProducts.forEach(product => {
                    const li = `<a href='#'><li class='p-2 hover:bg-orange_color hover:text-white hover:underline'>${product.name}</li></a><hr class='text-sky_blue_color'>`;
                    ul.append(li);
                });
            } else {
                ul.append(`<li class='p-2'>No results found</li>`);
            }
        }

        // Function to search products
        $('#search-form').on('keyup change', 'input', function() {
            const search = $("#search-product").val().trim();
            const resultContainer = $("#search-product-result");
            showProduct(search, resultContainer);
        });

        $("#search-field").on('input',function(){
            const search = $(this).val().trim();
            const resultContainer = $("#search-product-result2");
            showProduct(search, resultContainer);
        })

        let searchOpen = $("#search-field").is(":visible");
        $("#search-field-open").on('click', function() {
            if (searchOpen) {
                $("#search-field").slideUp(200);
                $("#search-open-icon").show();
                $("#search-close-icon").hide();
                searchOpen = false;
            } else {
                $("#search-field").slideDown(200);
                $("#search-open-icon").hide();
                $("#search-close-icon").show();
                searchOpen = true;
            }
        });

        fetchAllProducts();

        document.querySelectorAll('.category').forEach(element => {
            element.addEventListener('click', function() {
                const category = this.getAttribute('data-category');
                const currentPage = new URLSearchParams(window.location.search).get('page') || 1;
                window.location.href = `{{ route('brand') }}?category=${category}&page=${currentPage}`;
            });
        });
    });
</script>
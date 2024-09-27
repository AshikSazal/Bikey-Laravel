@extends('app')

@section('content')
    <div class="mt-[120px]">
        @if (!empty($carts->items))
            <div class="grid grid-cols-3 m-6">
                <div class="col-span-2 w-full">
                    @foreach ($carts->items as $cart)
                        <div class="mb-4">
                            <x-cart-product :cart="$cart" />
                        </div>
                    @endforeach
                </div>
                <div class="col-span-1">
                    <x-card class="bg-white">
                        <h1>Hello world</h1>
                    </x-card>
                </div>
            </div>
            @else
            <div class="flex items-center justify-center h-[80vh] ss:h-[40vh] md:h-[50vh] lg:h-[60vh] w-full px-4">
                <x-card class="bg-white w-full sm:w-3/4 md:w-2/4 lg:w-1/3">
                    <h1 id="no-item-cart" class="text-2xl text-center">NO ITEM IN THE CART</h1>
                    <div class="grid justify-center items-center mt-6 mb-4">
                        <x-button type="submit" class="sky_blue_color" id="login-btn" :disabled="false" link='true' href="{{route('brand')}}">GO TO SHOPPING</x-button>
                    </div>
                </x-card>
            </div>            
        @endif
        <x-error />
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const noItemCart = document.getElementById('no-item-cart');
            if (noItemCart) {
                const text = noItemCart.innerHTML;
                let index = 0;
                let isColored = false;

                function createColoredText() {
                    noItemCart.innerHTML = '';
                    for (let i = 0; i < text.length; i++) {
                        const span = document.createElement('span');
                        span.innerText = text[i];
                        span.style.color = i < index ? '#f85606' : '#1ca3e4';
                        noItemCart.appendChild(span);
                    }
                }

                function type() {
                    if (!isColored) {
                        if (index < text.length) {
                            index++;
                        } else {
                            isColored = true;
                        }
                    } else {
                        if (index > 0) {
                            index--;
                        } else {
                            isColored = false;
                            index = 0;
                        }
                    }
                    createColoredText();
                }
                setInterval(type, 100);
            }

            $('.increase').on('click', function(event) {
                event.preventDefault();
                const showError = document.getElementById('open-pop-up');
                const product_id = $(this).attr('data-id');
                $.ajax({
                    headers: {'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')},
                    type: 'GET',
                    url: `/add-to-cart/${product_id}`,
                    success: function(res) {
                        const totalCart = res.cart.totalQty;
                        $("#user-cart").text(totalCart);
                        $(`.cart-input-${product_id}`).val(res.cart.items[product_id].qty);
                        console.log(res.cart.items[product_id].price);
                        $(`.cart-price-${product_id}`).text(res.cart.items[product_id].price);
                        // $(`.cart-price-${product_id}`).show();
                    },
                    error: function(xhr, status, error) {
                        showError.style.display = "flex";
                        showError.classList.add("z-20","bg-black", "bg-opacity-80");
                        document.body.style.overflow = 'hidden';
                        $('#show-error-message').text(xhr.responseJSON.error);
                        $("#show-error-message").show();
                    }
                });
            });

            $('.decrease').on('click', function(event) {
                event.preventDefault();
                const showError = document.getElementById('open-pop-up');
                const product_id = $(this).attr('data-id');
                $.ajax({
                    headers: {'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')},
                    type: 'GET',
                    url: `/remove-cart/${product_id}`,
                    success: function(res) {
                        const totalCart = res.cart.totalQty;
                        $("#user-cart").text(totalCart);
                        if(!res.cart.items[product_id])
                            $(`.cart-input-${product_id}`).closest('.remove-cart').remove();
                        else{
                            $(`.cart-input-${product_id}`).val(res.cart.items[product_id].qty);
                            $(`.cart-price-${product_id}`).text(res.cart.items[product_id].price);
                            // $(`.cart-price-${product_id}`).show();
                        }
                    },
                    error: function(xhr, status, error) {
                        showError.style.display = "flex";
                        showError.classList.add("z-20","bg-black", "bg-opacity-80");
                        document.body.style.overflow = 'hidden';
                        $('#show-error-message').text(xhr.responseJSON.error);
                        $("#show-error-message").show();
                    }
                });
            });
        });
    </script>
@endsection

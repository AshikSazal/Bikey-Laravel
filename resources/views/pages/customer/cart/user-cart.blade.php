@extends('app')

@section('content')
    <div class="mt-[120px]">
        @if (!empty($carts->items))
            <div class="flex justify-around m-6">
                <div class="w-full">
                    @foreach ($carts->items as $cart)
                        <div class="mb-4">
                            <x-cart-product :cart="$cart" />
                        </div>
                    @endforeach
                </div>
                <x-card class="bg-white h-[300px]">
                    <div class="w-full">
                        <div>
                            <h2 class="text-lg font-bold mb-4">SUMMARY</h2>
                            <hr class="h-2 border-t-2 border-gray-300">
                            <div class="flex justify-between">
                                <p class="text-sm font-bold mb-2">ITEMS:</p>
                                <p id="user-cart2" class="text-sm font-bold mb-2">${{ $carts->totalQty }}</p>
                            </div>
                            <div class="flex justify-between">
                                <p class="text-sm font-bold mb-2">PRICE:</p>
                                <p id="cart-total-price" class="text-sm font-bold mb-2">${{ $carts->totalPrice }}</p>
                            </div>
                            <div class="flex justify-between">
                                <p class="text-sm font-bold mb-2">DELIVERY:</p>
                                <p class="text-sm font-bold mb-2">$5</p>
                            </div>
                            <hr class="h-2 border-t-2 border-gray-300">
                            <div class="flex justify-between">
                                <p class="text-sm font-bold mb-2">TOTAL:</p>
                                <p id="cart-total-price-deli" class="text-sm font-bold mb-2">${{$carts->totalPrice+5}}</p>
                            </div>
                            <div class="grid mt-6 mb-4 place-items-center">
                                <x-button type="submit" class="orange_color" id="check-out-btn" :disabled="false" link='true' href="{{ $address ? route('user.payment') : route('user.address') }}">CHECKOUT</x-button>
                            </div>
                        </div>
                    </div>
                </x-card>
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
                        const totalPrice = res.cart.totalPrice;
                        $("#user-cart").text(totalCart);
                        $("#user-cart2").text(totalCart);
                        $("#cart-total-price").text(totalPrice);
                        $("#cart-total-price-deli").text(totalPrice+5);
                        $(`.cart-input-${product_id}`).val(res.cart.items[product_id].qty);
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
                        const totalPrice = res.cart.totalPrice;
                        $("#user-cart").text(totalCart);
                        $("#user-cart2").text(totalCart);
                        $("#cart-total-price").text(totalPrice);
                        $("#cart-total-price-deli").text(totalPrice+5);
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

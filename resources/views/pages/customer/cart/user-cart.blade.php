'"@extends('app')

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
        });
    </script>
@endsection

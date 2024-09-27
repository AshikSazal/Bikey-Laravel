<x-product-card class="bg-white max-w-xl p-6 rounded-xl remove-cart">
    <div class="grid grid-cols-3 gap-2">
        <div class="col-span-1">
            <img src="{{ $cart['item']->image }}" alt="">
        </div>
        <div class="col-span-2 flex justify-between">
            <div class="grid grid-rows-2">
                <div class="row-span-1">
                    <h1 class="font-bold text-2xl">{{ $cart['item']->name }}</h1>
                </div>
                <div class="row-span-1 flex items-end">
                    <div class="flex space-x-10 items-center">
                        <div class="flex items-center">
                            <button class="p-2 rounded focus:outline-none text-2xl decrease" data-id="{{$cart['item']->id}}">-</button>
                            <input style="-webkit-appearance: none; margin: 0; -moz-appearance: textfield;" type="number" value="{{ $cart['qty'] }}" class="w-10 text-center border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-200 cart-input-{{$cart['item']->id}}" />
                            <button class="p-2 rounded focus:outline-none text-2xl increase" data-id="{{$cart['item']->id}}">+</button>
                        </div>
                        <p>$<span class="cart-price-{{$cart['item']->id}}">{{ $cart['price'] }}</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-product-card>

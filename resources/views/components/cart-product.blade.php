<x-product-card class="bg-white max-w-xl p-6 rounded-xl">
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
                    <div class="flex space-x-10">
                        <p>Quantity: {{ $cart['qty'] }}</p>
                        <p>${{ $cart['price'] }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-product-card>

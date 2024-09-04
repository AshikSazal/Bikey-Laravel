<x-product-card class="bg-white">
    <div class="bg-white">
        <img src="{{$product->image}}" alt="Product Image" class="w-full h-auto">
    </div>
    <div class="mt-4 p-4">
        <h1 class="text-xl underline"><a href="">{{$product->name}}</a></h1>
        <h2 class="text-sky_blue_color text-lg font-bold mt-4">ট {{$product->price}}</h2>
        <div class="flex justify-between mt-4">
            <x-button type="submit" class="orange_color" id="buy-now" :disabled="false" link=true>BUY NOW</x-button>
            <x-button type="submit" class="sky_blue_color" id="add-to-cart" :disabled="false" link=true href="route('user.addToCart',['id'=>$product->id])">ADD TO CART</x-button>
        </div>
    </div>
</x-product-card>
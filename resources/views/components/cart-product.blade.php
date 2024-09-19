<x-product-card class="bg-white">
    <h1>{{ $cart['item']->name }}</h1>
    <p>Quantity: {{ $cart['qty'] }}</p>
    <p>Price: {{ $cart['price'] }}</p>
</x-product-card>
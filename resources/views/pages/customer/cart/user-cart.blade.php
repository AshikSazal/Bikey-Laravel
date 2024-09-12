@if(!empty($carts))
    @foreach($carts->items as $cart)
        <h1>{{ $cart['item']->name }}</h1>
        <p>Quantity: {{ $cart['qty'] }}</p>
        <p>Price: {{ $cart['price'] }}</p>
    @endforeach
@else
    <h1>NOT FOUND</h1>
@endif
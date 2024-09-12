@if(!empty($carts))
    @forEach($carts as $cart)
        <h1>{{$cart->name}}</h1>
    @endforeach
@else
    <h1>NOT FOUND</h1>
@endif
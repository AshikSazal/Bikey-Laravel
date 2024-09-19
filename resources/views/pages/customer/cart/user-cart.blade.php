@extends('app')

@section('content')
    <div class="mt-[90px]">
        @if (!empty($carts))
            @foreach ($carts->items as $cart)
                <x-cart-product :cart="$cart" />
            @endforeach
        @else
            <h1>NOT FOUND</h1>
        @endif
    </div>
@endsection

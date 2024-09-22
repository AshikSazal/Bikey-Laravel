@extends('app')

@section('content')
    <div class="mt-[120px]">
        <div class="grid grid-cols-3 m-6">
            <div class="col-span-2 w-full">
                @if (!empty($carts->items))
                    @foreach ($carts->items as $cart)
                        <div class="mb-4">
                            <x-cart-product :cart="$cart" />
                        </div>
                    @endforeach
                @else
                    <h1>NOT FOUND</h1>
                @endif
            </div>
            <div class="col-span-1">
                <x-card class="bg-white">
                    <h1>Hello world</h1>
                </x-card>
            </div>
        </div>
    </div>
@endsection

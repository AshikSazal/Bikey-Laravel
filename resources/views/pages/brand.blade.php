@extends('app')

@section('content')
    <div class="mt-[90px]">
        @include('pages.brand-section.search')
        <div class="p-4 flex items-center justify-center flex-col">
            <div class="grid gap-4 grid-cols-1 xs:grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-5">
                @if (count($products) > 0)
                    @foreach ($products as $product)
                        <x-product :product="$product" />
                    @endforeach
                @else
                    <div class="col-span-full text-center">
                        No Product Found
                    </div>
                @endif
            </div>
        </div>

    </div>
@endsection
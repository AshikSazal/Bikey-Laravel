@extends('app')

@section('content')
    <div class="mt-[90px]">
        @include('pages.brand-section.search')
        <div class="p-4 grid gap-4 
    grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">
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
@endsection
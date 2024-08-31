@extends('app')

@section('content')
    <div class="mt-[90px]">
        @include('pages.brand-section.search')
        <x-product />
    </div>
@endsection
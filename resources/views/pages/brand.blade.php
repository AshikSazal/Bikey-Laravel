@extends('app')

@section('content')
    <div class="mt-[90px] pb-4">
        @include('pages.brand-section.search')
        <form action="{{route('user.addToCart')}}" method="POST">
            @csrf
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
    </form>
        <div class="flex justify-center">
            {!! $products->onEachSide(1)->links() !!}
        </div>
    </div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('.add-to-cart').on('click', function(event) {
            const product_id = $(this).data('product-id');
            $.ajax({
                headers: {'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')},
                type: 'POST',
                url: "/add-to-cart",
                data: {
                    id: product_id
                },
                success: function(res) {
                    const totalCart = res.cart.totalQty;
                    $("#user-cart").text(totalQty);
                },
                error: function(xhr, status, error) {
                    $("#show-message").text(xhr.responseJSON.error);
                    $("#show-message").show();
                }
            })
        });
    });
</script>
@endsection
@extends('app')

@section('content')
    <div class="mt-[90px] pb-4">
        @include('pages.brand-section.search')
        <div class="p-4 flex items-center justify-center flex-col">
            <div class="grid gap-4 grid-cols-1 xs:grid-cols-2 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-4 xl:grid-cols-5">
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
        <div class="flex justify-center">
            {!! $products->onEachSide(1)->links() !!}
        </div>
        <x-loading />
    </div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('.add-to-cart').on('click', function(event) {
            event.preventDefault();
            const showError = document.getElementById('open-pop-up');
            const href = $(this).attr('href');
            const idMatch = href.match(/\/add-to-cart\/(\d+)$/);
            const product_id = idMatch ? idMatch[1] : null;
            $.ajax({
                headers: {'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')},
                type: 'GET',
                url: `/add-to-cart/${product_id}`,
                success: function(res) {
                    const totalCart = res.cart.totalQty;
                    $("#user-cart").text(totalCart);
                },
                error: function(xhr, status, error) {
                    showError.style.display = "flex";
                    showError.classList.add("z-20","bg-black", "bg-opacity-80");
                    document.body.style.overflow = 'hidden';
                    $('#show-error-message').text(xhr.responseJSON.error);
                    $("#show-error-message").show();
                }
            })
        });
    });
</script>
@endsection
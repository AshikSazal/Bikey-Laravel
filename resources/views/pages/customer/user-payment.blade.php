@extends('app')

@section('content')
    <div class="h-screen">
        <div class="w-full flex justify-center items-center h-full">
            <x-card class="bg-sky_blue_color w-screen ss:w-2/3 md:w-2/3 lg:w-2/4">
                <form id="payment-form" method="POST" action="{{route('user.payment')}}">
                    @csrf
                    <x-input type="text" name="holder-name" placeholder="Enter Card Holder Name" />
                    <x-input type="text" name="card-number" placeholder="Enter Card Number" />
                    <x-input type="text" name="cvc" placeholder="Enter Card Verification Code" />
                    <x-input type="text" name="card-expiry" placeholder="Enter Your Card Expiry (MM/YYYY)" />
                    <div class="grid justify-center items-center mt-6 mb-4">
                        <x-button type="submit" class="orange_color" id="payment-btn" :disabled="true">SUBMIT</x-button>
                    </div>
                </form>
            </x-card>
        </div>
        <x-error />
        <x-loading />
    </div>
@endsection

@section('scripts')

<script type="module">
    import { validate, VALIDATOR_REQUIRE, VALIDATOR_EMAIL, VALIDATOR_PHONE_NUMBER, VALIDATOR_MINLENGTH } from "{{ URL::to('src/js/validator.js') }}";

    document.addEventListener("DOMContentLoaded", function() {
        var userHolderName, userCardNumber, userCVC, userCardExpiry;
        const showError = document.getElementById('open-pop-up');
        const loading = document.getElementById("loading-container");

        function isFormValid() {
            const holderName = $('input[name="holder-name"]').val();
            const cardNumber = $('input[name="card-number"]').val();
            const cvc = $('input[name="cvc"]').val();
            const cardExpiry = $('input[name="card-expiry"]').val();

            const holderNameIsValid = validate(holderName, [VALIDATOR_REQUIRE()]);
            const cardNumberIsValid = validate(cardNumber, [VALIDATOR_REQUIRE(),VALIDATOR_FIXLENGTH(10)]);
            const cvcIsValid = validate(cvc, [VALIDATOR_REQUIRE()]);
            const cardExpiryIsValid = validate(cardExpiry, [VALIDATOR_REQUIRE(),VALIDATOR_FIXLENGTH(7)]);

            if (holderNameIsValid && cardNumberIsValid && cvcIsValid && cardExpiryIsValid) {
                userHolderName = holderName;
                userCardNumber = cardNumber;
                userCVC = cvc;
                userCardExpiry = cardExpiry.replace('/', '-');
                return true;
            } else {
                return false;
            }
        }

        function formValidate(){
            if (isFormValid()) {
                $('#address-btn').css({
                    "background-color":"#f85606",
                    "border-color":"#f85606"
                }).prop('disabled', false);
            } else {
                $('#address-btn').css({
                    "background-color": "#9ca3af",
                    "border-color": "#9ca3af"
                }).prop('disabled', true);
            }
        }

        function emptyInputField(){
            $('input[name="holder-name"]').val("");
            $('input[name="card-number"]').val("");
            $('input[name="cvc"]').val("");
            $('input[name="card-expiry"]').val("");
        }

        $('#address-form').on('keyup change','input',function(){
            formValidate();
        });

        $('#address-form').on('submit',function(event){
            event.preventDefault();
            
            $.ajax({
                type:"POST",
                url: "{{route('user.payment')}}",
                data: {
                    _token: '{!! csrf_token() !!}',
                    holderName: userHolderName,
                    cardNumber: userCardNumber,
                    cvc: userCVC,
                    cardExpiry: userCardExpiry
                },
                beforeSend: function(){
                    loading.style.display="flex";
                    document.body.style.overflow = 'hidden';
                },
                success: function(){
                    // loading.style.display="none";
                    // document.body.style.overflow = '';
                    window.location.href = "{{ route('home') }}";
                },
                error: function(xhr, status, error){
                    loading.style.display="none";
                    // document.body.style.overflow = '';
                    
                    showError.style.display = "flex";
                    showError.classList.add("z-20","bg-black", "bg-opacity-80");
                    document.body.style.overflow = 'hidden';
                    $('#show-error-message').text(xhr.responseJSON.error);
                    $("#show-error-message").show();
                }
            });
        });

        // Empty the input field when reload the page
        window.addEventListener('load', function() {
            emptyInputField();
        });
    });
</script>

@endsection
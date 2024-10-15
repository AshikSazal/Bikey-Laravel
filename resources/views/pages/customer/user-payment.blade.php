@extends('app')

@section('content')
    <div class="h-screen">
        <div class="w-full flex justify-center items-center h-full">
            @if (!$payment)
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
            @else
                <x-card class="bg-sky_blue_color shadow-md rounded-lg p-6 mt-4 w-screen ss:w-1/2 md:w-1/3 lg:w-1/4" id="payment-info">
                    <h2 class="text-xl font-semibold text-center text-white">PAYMENT INFORMATION</h2>
                    <div class="bg-white -m-6 mt-4 p-6 rounded-b-lg">
                        <hr class="h-0.5 bg-orange_color border-0">
                        <table class="w-full mt-4">
                            <tbody>
                                <tr class="mb-4">
                                    <td class="pr-2"><strong>HOLDER NAME</strong></td>
                                    <td class="uppercase" id="holder-name-info">{{ $payment->holder_name }}</td>
                                </tr>
                                <tr class="mb-4">
                                    <td class="pr-2"><strong>CARD NUMBER</strong></td>
                                    <td class="uppercase" id="card-number-info">{{ $payment->card_number }}</td>
                                </tr>
                                <tr class="mb-4">
                                    <td class="pr-2"><strong>CARD VERIFICATION CODE</strong></td>
                                    <td class="uppercase" id="cvc-info">{{ $payment->cvc }}</td>
                                </tr>
                                <tr class="mb-4">
                                    <td class="pr-2"><strong>CARD EXPIRY</strong></td>
                                    <td class="uppercase" id="card-expiry-info">{{ $payment->card_expiry }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="grid justify-center items-center mt-6">
                            <x-button type="button" class="orange_color" id="go-to-shopping" :disabled="false" link='true' href="{{route('brand')}}">GO TO SHOPPING</x-button>
                        </div>
                        <div class="flex justify-center mt-3">
                            <a class="text-sky_blue_color text-md underline cursor-pointer" id="edit-payment-btn">Edit</a>
                        </div>
                    </div>
                </x-card>
                <x-card class="bg-sky_blue_color w-screen ss:w-2/3 md:w-2/3 lg:w-2/4 hidden" id="edit-payment-card">
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
            @endif
        </div>
        <x-error />
        <x-loading />
    </div>
@endsection

@section('scripts')
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script type="module">
    import { validate, VALIDATOR_REQUIRE, VALIDATOR_EMAIL, VALIDATOR_PHONE_NUMBER, VALIDATOR_MINLENGTH, VALIDATOR_FIXLENGTH } from "{{ URL::to('src/js/validator.js') }}";
    
    document.addEventListener("DOMContentLoaded", function() {
        Stripe.setPublishableKey("{{ env('STRIPE_PUBLIC_API_KEY') }}");

        let userHolderName = document.getElementById('holder-name-info').textContent;
        let userCardNumber = document.getElementById('card-number-info').textContent;
        let userCVC = document.getElementById('cvc-info').textContent;
        let userCardExpiry = document.getElementById('card-expiry-info').textContent;
        var orderToken = null;

        const showError = document.getElementById('open-pop-up');
        const loading = document.getElementById("loading-container");

        function isFormValid() {
            const holderName = $('input[name="holder-name"]').val();
            const cardNumber = $('input[name="card-number"]').val();
            const cvc = $('input[name="cvc"]').val();
            const cardExpiry = $('input[name="card-expiry"]').val();

            const holderNameIsValid = validate(holderName, [VALIDATOR_REQUIRE()]);
            const cardNumberIsValid = validate(cardNumber, [VALIDATOR_REQUIRE(),VALIDATOR_FIXLENGTH(16)]);
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
                $('#payment-btn').css({
                    "background-color":"#f85606",
                    "border-color":"#f85606"
                }).prop('disabled', false);
            } else {
                $('#payment-btn').css({
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

        $('#payment-form').on('keyup change','input',function(){
            formValidate();
        });

        function stripeResponseHandler(status, response, callback) {
            if (response.error) {
                loading.style.display = "none";
                showError.style.display = "flex";
                showError.classList.add("z-20", "bg-black", "bg-opacity-80");
                document.body.style.overflow = 'hidden';
                $('#show-error-message').text(userCardNumber);
                $("#show-error-message").show();
            } else {
                const token = response.id;
                callback(token);
            }
        }

        function orderDone(){
            const [month, year] = userCardExpiry.split("/");

            Stripe.card.createToken({
                number: userCardNumber,
                cvc: userCVC,
                exp_month: month,
                exp_year: year,
                name: userHolderName
            },function(status, response) {
                stripeResponseHandler(status, response, function(token) {
                    $.ajax({
                        headers: {'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')},
                        type:"POST",
                        url: "{{ route('user.payment') }}",
                        data: {
                            holderName: userHolderName,
                            cardNumber: userCardNumber,
                            cvc: userCVC,
                            cardExpiry: userCardExpiry.replace('/','-'),
                            token: token
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
                            $('#show-error-message').text(xhr.responseJSON.message);
                            $("#show-error-message").show();
                        }
                    });
                });
            });
        }

        $('#payment-form').on('submit',function(event){
            event.preventDefault();
            
            orderDone();
        });
        $('#go-to-shopping').on('click',function(event){
            event.preventDefault();
            
            orderDone();
        });

        $("#edit-payment-btn").on('click', function(event) {
            const paymentInfo = document.getElementById('payment-info');
            const editCard = document.getElementById('edit-payment-card');

            const holderNameInfo = document.getElementById('holder-name-info').textContent;
            const cardNumberInfo = document.getElementById('card-number-info').textContent;
            const cvcInfo = document.getElementById('cvc-info').textContent;
            const cardExpiryInfo = document.getElementById('card-expiry-info').textContent;

            $('input[name="holder-name"]').val(holderNameInfo);
            $('input[name="card-number"]').val(cardNumberInfo);
            $('input[name="cvc"]').val(cvcInfo);
            $('input[name="card-expiry"]').val(cardExpiryInfo);

            formValidate();

            paymentInfo.style.display = 'none';
            editCard.classList.remove('hidden');
        });

        // Empty the input field when reload the page
        window.addEventListener('load', function() {
            emptyInputField();
        });
    });
</script>

@endsection
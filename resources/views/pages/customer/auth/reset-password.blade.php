@extends('app')

@section('content')
<div class="ss:h-[50vh] md:h-[60vh] mt-[90px] h-screen">
    <div class="w-full flex justify-center items-center h-full">
        <x-card class="bg-sky_blue_color w-screen ss:w-2/3 md:w-2/3 lg:w-1/3">
            <form id="reset-password-form" method="POST" action="{{route('user.login')}}">
                @csrf
                <x-input type="email" name="email" placeholder="Enter Your E-Mail" />
                <div class="grid justify-center items-center mt-6 mb-4">
                    <x-button type="submit" class="orange_color" id="reset-button">SUBMIT</x-button>
                </div>
            </form>
        </x-card>
    </div>
    <x-error />
</div>
@endsection

@section('scripts')
<script type="module">
    import { validate, VALIDATOR_REQUIRE, VALIDATOR_EMAIL, VALIDATOR_MINLENGTH } from "{{ URL::to('src/js/validator.js') }}";

    document.addEventListener("DOMContentLoaded", function() {
        var email, userPassword;

        function isEmailFormValid() {
            const userEmail = $('input[name="email"]').val();
            console.log(userEmail);

            var emailIsValid = validate(userEmail, [VALIDATOR_REQUIRE(),VALIDATOR_EMAIL()]);

            if(emailIsValid) {
                email=userEmail;
                return true;
            } else {
                return false;
            }
        }

        function formValidate(){
            if (isEmailFormValid()) {
                $('#reset-button').css({
                    "background-color":"#f85606",
                    "border-color":"#f85606"
                }).prop('disabled', false);
            } else {
                $('#reset-button').css({
                    "background-color": "#9ca3af",
                    "border-color": "#9ca3af"
                }).prop('disabled', true);
            }
        }

        function emptyInputField(){
            $('input[name="email"]').val("");
        }

        $('#reset-password-form').on('keyup change','input',function(){
            formValidate();
        });

        // Empty the input field when reload the page
        window.addEventListener('load', function() {
            emptyInputField();
        });
    });
</script>
@endsection
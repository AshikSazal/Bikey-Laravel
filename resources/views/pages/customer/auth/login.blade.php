@extends('app')

@section('content')
    <div class="h-screen">
        <div class="w-full flex justify-center items-center h-full">
            <x-card class="bg-sky_blue_color w-screen ss:w-2/3 md:w-1/3">
                <form id="login-form" method="POST" action="{{route('user.login')}}">
                    @csrf
                    <x-input type="text" name="email_phone" placeholder="Enter Your E-Mail or Phone" />
                    <x-input type="password" name="password" placeholder="Enter Your Password" />
                    <div class="grid justify-center items-center mt-6 mb-4">
                        <x-button type="submit" class="orange_color" id="login-btn" :disabled="true">LOGIN</x-button>
                    </div>
                </form>
                <div class="flex justify-between">
                    <a class="text-white text-md underline" href="{{route('user.signup')}}">Create an account?Signup</a>
                    <a class="text-md text-black underline" href="{{route('user.reset.password')}}">Forget Password?Reset</a>
                </div>
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
        var emailPhone, userPassword;
        const showError = document.getElementById('open-pop-up');
        const loading = document.getElementById("loading-container");

        function isFormValid() {
            var email = $('input[name="email_phone"]').val();
            var pass = $('input[name="password"]').val();

            var phoneIsValid = validate(email, [VALIDATOR_REQUIRE(),VALIDATOR_PHONE_NUMBER()]);
            var emailIsValid = validate(email, [VALIDATOR_REQUIRE(),VALIDATOR_EMAIL()]);
            var passwordIsValid = validate(pass, [VALIDATOR_REQUIRE(),VALIDATOR_MINLENGTH(4)]);

            if ((emailIsValid || phoneIsValid) && passwordIsValid) {
                emailPhone=email;
                userPassword=pass;
                return true;
            } else {
                return false;
            }
        }

        function formValidate(){
            if (isFormValid()) {
                $('#login-btn').css({
                    "background-color":"#f85606",
                    "border-color":"#f85606"
                }).prop('disabled', false);
            } else {
                $('#login-btn').css({
                    "background-color": "#9ca3af",
                    "border-color": "#9ca3af"
                }).prop('disabled', true);
            }
        }

        function emptyInputField(){
            $('input[name="email_phone"]').val("");
        }

        $('#login-form').on('keyup change','input',function(){
            formValidate();
        });

        $('#login-btn').on('click',function(event){
            event.preventDefault();
            
            $.ajax({
                type:"POST",
                url: "{{route('user.login')}}",
                data: {
                    _token: '{!! csrf_token() !!}',
                    emailPhone: emailPhone,
                    password: userPassword
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

        // Empty the input field when reload the page
        window.addEventListener('load', function() {
            emptyInputField();
        });
    });
</script>

@endsection
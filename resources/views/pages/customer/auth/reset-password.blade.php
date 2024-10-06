@extends('app')

@section('content')
<div class="ss:h-[50vh] md:h-[60vh] mt-[90px] h-screen">
    <div class="w-full flex justify-center items-center h-full">
        <x-card class="bg-sky_blue_color w-screen ss:w-2/3 md:w-2/3 lg:w-1/3">
            <form id="reset-password-email-form" method="POST" action="{{route('reset.password.email')}}">
                @csrf
                <x-input type="email" name="email" placeholder="Enter Your E-Mail" />
                <div class="grid justify-center items-center mt-6 mb-4">
                    <x-button type="submit" class="orange_color" id="reset-password-email-button">SUBMIT</x-button>
                </div>
            </form>
            <form id="reset-password-code-form" method="POST" action="{{route('reset.password.code')}}" class="flex-col items-center hidden">
                @csrf
                <h1 class="text-[#f9f871] text-center text-lg md:text-xl font-semibold mb-6">A verification code send to your mail. Please enter the code below</h1>
                <input name="code" class="h-[45px] w-[100px] rounded-md ouline-none text-xl items-center text-center border border-gray-300 focus:shadow-md" type="text" />
                <div class="grid justify-center items-center mt-6 mb-4">
                    <x-button type="submit" class="orange_color" id="reset-password-code-button">SUBMIT</x-button>
                </div>
            </form>
            <form id="reset-password-form" method="POST" action="{{route('reset.password')}}" class="hidden">
                @csrf
                <x-input type="password" name="password" placeholder="Enter Your Password" />
                <div class="grid justify-center items-center mt-6 mb-4">
                    <x-button type="submit" class="orange_color" id="reset-password-button">SUBMIT</x-button>
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
    import { validate, VALIDATOR_REQUIRE, VALIDATOR_EMAIL, VALIDATOR_MINLENGTH } from "{{ URL::to('src/js/validator.js') }}";

    document.addEventListener("DOMContentLoaded", function() {
        var email, code, password;
        const showError = document.getElementById('open-pop-up');
        const loading = document.getElementById("loading-container");
        
        function emptyInputField(){
            $('input[name="email"]').val("");
            $('input[name="code"]').val("");
            $('input[name="password"]').val("");
        }

        function isEmailFormValid() {
            const userEmail = $('input[name="email"]').val();

            const emailIsValid = validate(userEmail, [VALIDATOR_REQUIRE(),VALIDATOR_EMAIL()]);

            if(emailIsValid) {
                email=userEmail;
                return true;
            } else {
                return false;
            }
        }
        function isCodeFormValid() {
            const userCode = $('input[name="code"]').val();

            const codeIsValid = validate(userCode, [VALIDATOR_REQUIRE(), VALIDATOR_MINLENGTH(4)]);

            if(codeIsValid) {
                code = userCode;
                return true;
            } else {
                return false;
            }
        }
        function isPasswordFormValid() {
            const userPassword = $('input[name="password"]').val();

            const passwordIsValid = validate(userPassword, [VALIDATOR_REQUIRE(), VALIDATOR_MINLENGTH(4)]);

            if(passwordIsValid) {
                password = userPassword;
                return true;
            } else {
                return false;
            }
        }

        function formValidate(isFormValid, submitBtn){
            if (isFormValid()) {
                $(submitBtn).css({
                    "background-color":"#f85606",
                    "border-color":"#f85606"
                }).prop('disabled', false);
            } else {
                $(submitBtn).css({
                    "background-color": "#9ca3af",
                    "border-color": "#9ca3af"
                }).prop('disabled', true);
            }
        }

        
        $('#reset-password-email-form').on('keyup change','input',function(){
            formValidate(isEmailFormValid,'#reset-password-email-button');
        });
        $('#reset-password-code-form').on('keyup change','input',function(){
            formValidate(isCodeFormValid,'#reset-password-code-button');
        });
        $('#reset-password-form').on('keyup change','input',function(){
            formValidate(isPasswordFormValid,'#reset-password-button');
        });

        $("#reset-password-email-form").submit(function(event){
            event.preventDefault();
            $.ajax({
                headers: {'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')},
                type: "POST",
                url: "/reset-password-email",
                data: { email: email},
                beforeSend: function(){
                    loading.style.display="flex";
                    document.body.style.overflow = 'hidden';
                },
                success: function(res) {
                    loading.style.display="none";
                    document.body.style.overflow = '';
                    $('#reset-password-email-form').css({
                        "display":"none"
                    });
                    $('#reset-password-code-form').css({
                        "display":"flex"
                    });
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

        $("#reset-password-code-form").submit(function(event){
            event.preventDefault();
            $.ajax({
                headers: {'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')},
                type: "POST",
                url: "/reset-password-code",
                data: { email: email, code: code },
                beforeSend: function(){
                    loading.style.display="flex";
                    document.body.style.overflow = 'hidden';
                },
                success: function(res) {
                    loading.style.display="none";
                    document.body.style.overflow = '';
                    $('#reset-password-code-form').css({
                        "display":"none"
                    });
                    $('#reset-password-form').css({
                        "display":"flex"
                    });
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

        // reset the password
        $("#reset-password-form").submit(function(event){
            event.preventDefault();
            $.ajax({
                headers: {'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')},
                type: "POST",
                url: "/reset-password",
                data: { email: email, password: password },
                beforeSend: function(){
                    loading.style.display="flex";
                    document.body.style.overflow = 'hidden';
                },
                success: function(res) {
                    loading.style.display="none";
                    document.body.style.overflow = '';
                    window.location.href = "{{ route('user.login') }}";
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
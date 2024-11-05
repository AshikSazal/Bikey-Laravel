<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="./images/logo.png" type="image/png">
    <link rel="stylesheet" href="./src/css/loading.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script type="text/javascript" src="{{ URL::to('src/js/firebase.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('src/js/jquery.js') }}"></script>
    @vite(['resources/css/app.css', 'resources/css/header.css', 'resources/css/chat.css', 'resources/css/landing-page.css', 'resources/css/input.css','resources/js/app.js'])
    <script>
        {!! Vite::content('resources/js/app.js') !!}
    </script>
    <script src="{{asset('src/js/chat.js')}}"></script>
    <script>
        var sender_id = Auth::guard('admin')->check() ? Auth::guard('admin')->user()->id : null;
        var receiver_id=99999;
        var messageSize;
    </script>
    <title>Bikey</title>
</head>

<body>
    <div class="h-screen">
        <div class="w-full flex justify-center items-center h-full">
            <x-card class="bg-sky_blue_color w-screen ss:w-2/3 md:w-1/3">
                <form id="login-form" method="POST" action="{{route('admin.login')}}">
                    @csrf
                    <x-input type="email" name="email" placeholder="Enter Your E-Mail" />
                    <x-input type="password" name="password" placeholder="Enter Your Password" />
                    <div class="grid justify-center items-center mt-6 mb-4">
                        <x-button type="submit" class="orange_color" id="login-btn" :disabled="true">LOGIN</x-button>
                    </div>
                </form>
            </x-card>
        </div>
        <x-error />
    </div>

    <script>
        // until fully loaded the page loading spinner will show
        document.onreadystatechange = function() {
            if (document.readyState !== "complete") {
                document.querySelector("body").style.overflow = 'hidden';
                document.querySelector("#loading-container").style.display = "flex";
            } else {
                document.querySelector("#loading-container").style.display = "none";
                document.querySelector("body").style.overflow = "";
            }
        };

        import { validate, VALIDATOR_REQUIRE, VALIDATOR_EMAIL, VALIDATOR_MINLENGTH } from "{{ URL::to('src/js/validator.js') }}";

        document.addEventListener("DOMContentLoaded", function() {
            var emailPhone, userPassword;
            const showError = document.getElementById('open-pop-up');
            const loading = document.getElementById("loading-container");

            function isFormValid() {
                var email = $('input[name="email"]').val();
                var pass = $('input[name="password"]').val();

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
                $('input[name="email"]').val("");
            }

            $('#login-form').on('keyup change','input',function(){
                formValidate();
            });

            $('#login-btn').on('click',function(event){
                event.preventDefault();
                
                $.ajax({
                    type:"POST",
                    url: "{{route('admin.login')}}",
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
                        window.location.href = "{{ route('admin.dashboard') }}";
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
</body>

</html>
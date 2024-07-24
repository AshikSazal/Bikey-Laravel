@extends('app')

@section('content')
    <div class="h-screen mt-[90px]">
        <div class="w-full flex justify-center items-center h-full">
            <x-card class="bg-sky_blue_color w-screen ss:w-2/3 md:w-1/3">
                <form id="signup-form" action="{{route('user.signup')}}" method="POST">
                    @csrf
                    <x-input type="text" name="name" placeholder="Enter Your Name" />
                    <x-input type="text" name="phone" placeholder="Enter Your Phone Number" />
                    <x-input type="text" name="email" placeholder="Enter Your E-Mail" />
                    <x-input type="password" name="password" placeholder="Enter Your Password" />
                    <div id="recaptcha-container" class="mt-2"></div>
                    <div class="grid justify-center items-center mt-6 mb-4">
                        <x-button type="submit" class="orange_color" id="show-pop-up">SIGN UP</x-button>
                    </div>
                </form>
                <a class="text-white text-md underline" href="{{route('user.login')}}">Have an account?Login</a>
            </x-card>
        </div>
    </div>
    <div id="otp" class="hidden z-20 relative justify-center items-center bg-white py-[30px] px-[65px]">
        <div class="absolute bg-white w-[450px] rounded-md">
            <div class="flex justify-center py-2">
                <header class="relative h-[65px] w-[65px] bg-sky_blue_color text-white flex flex-col justify-center items-center rounded-full">
                    <svg class="otp-show" fill="#fff" width="40px" height="40px" viewBox="0 0 36 36" version="1.1"  preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <path d="M31.25,7.4a43.79,43.79,0,0,1-6.62-2.35,45,45,0,0,1-6.08-3.21L18,1.5l-.54.35a45,45,0,0,1-6.08,3.21A43.79,43.79,0,0,1,4.75,7.4L4,7.59v8.34c0,13.39,13.53,18.4,13.66,18.45l.34.12.34-.12c.14,0,13.66-5.05,13.66-18.45V7.59ZM30,15.93c0,11-10,15.61-12,16.43-2-.82-12-5.44-12-16.43V9.14a47.54,47.54,0,0,0,6.18-2.25,48.23,48.23,0,0,0,5.82-3,48.23,48.23,0,0,0,5.82,3A47.54,47.54,0,0,0,30,9.14Z" class="clr-i-outline clr-i-outline-path-1"></path><path d="M10.88,16.87a1,1,0,0,0-1.41,1.41l6,6L26.4,13.77A1,1,0,0,0,25,12.33l-9.47,9.19Z" class="clr-i-outline clr-i-outline-path-2"></path>
                        <rect x="0" y="0" width="36" height="36" fill-opacity="0"/>
                    </svg>
                    <svg class="hidden otp-close" fill="#FF0000" width="40px" height="40px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c-9.4 9.4-9.4 24.6 0 33.9l47 47-47 47c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l47-47 47 47c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-47-47 47-47c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-47 47-47-47c-9.4-9.4-24.6-9.4-33.9 0z"/></svg>
                </header>
            </div>
            <div class="flex justify-center text-red-600 px-2 text-sm" id="show-message"></div>
            <h4 class="flex flex-col items-center justify-center pb-2">Enter OTP Code</h4>
            <div class="flex justify-center">
                <form action="{{route('user.login')}}" method="POST" id="verify-otp">
                    @csrf
                    <div class="flex gap-3 flex-row justify-center items-center input-field">
                        <input class="h-[45px] w-[42px] rounded-md ouline-none text-xl items-center text-center border border-gray-300 focus:shadow-md" type="number" />
                        <input class="h-[45px] w-[42px] rounded-md ouline-none text-xl items-center text-center border border-gray-300 focus:shadow-md" type="number" disabled />
                        <input class="h-[45px] w-[42px] rounded-md ouline-none text-xl items-center text-center border border-gray-300 focus:shadow-md" type="number" disabled />
                        <input class="h-[45px] w-[42px] rounded-md ouline-none text-xl items-center text-center border border-gray-300 focus:shadow-md" type="number" disabled />
                        <input class="h-[45px] w-[42px] rounded-md ouline-none text-xl items-center text-center border border-gray-300 focus:shadow-md" type="number" disabled />
                        <input class="h-[45px] w-[42px] rounded-md ouline-none text-xl items-center text-center border border-gray-300 focus:shadow-md" type="number" disabled />
                    </div>
                    <div class="grid justify-center items-center mt-4">
                        {{-- <button type="submit" class="relative border-gray-400 px-4 py-[6px] rounded-full text-white group overflow-hidden border-2 bg-gray-400" id="show-otp-button" disabled>
                            <span class="absolute inset-0 bg-white transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 ease-in-out origin-center"></span>
                            <span class="group-hover:text-sky_blue_color relative transition-colors duration-500 ease-in-out">Verify OTP</span>
                        </button> --}}
                        <x-button type="submit" class="sky_blue_color" id="show-otp-button">Verify OTP</x-button>
                    </div>
                    <a id="resend-otp" href="" class="flex justify-center my-4 underline text-gray-400 decoration-gray-400 pointer-events-none">Resend OTP</a>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
{{-- <script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script> --}}
<script type="text/javascript" src="{{ URL::to('src/js/firebase.js') }}"></script>
<script type="text/javascript" src="{{ URL::to('src/js/jquery.js') }}"></script>
<script type="module">
    import { validate, VALIDATOR_REQUIRE, VALIDATOR_EMAIL, VALIDATOR_PHONE_NUMBER, VALIDATOR_MINLENGTH } from "{{ URL::to('src/js/validator.js') }}";

    const firebaseConfig = {
        apiKey: "{{ env('FIREBASE_API_KEY') }}",
        authDomain: "{{ env('FIREBASE_AUTH_DOMAIN') }}",
        projectId: "{{ env('FIREBASE_PROJECT_ID') }}",
        storageBucket: "{{ env('FIREBASE_STORAGE_BUCKET') }}",
        messagingSenderId: "{{ env('FIREBASE_MESSAGING_SENDER_ID') }}",
        appId: "{{ env('FIREBASE_APP_ID') }}",
        measurementId: "{{ env('FIREBASE_MEASUREMENT_ID') }}"
    };
    firebase.initializeApp(firebaseConfig);

    document.addEventListener("DOMContentLoaded", function() {

        const showPopUp = document.getElementById("show-pop-up");
        const popUp = document.getElementById("otp");
        var showTimer = document.getElementById("show-message");
        const resendOTP = document.getElementById("resend-otp");

        const inputs = document.querySelectorAll(".input-field input");
        const button = document.getElementById("show-otp-button");

        var userName, userEmail, userPhone, userPassword;

        function otpButtonActive(){
            // button.classList.add("bg-sky_blue_color");
            // button.classList.remove("bg-gray-400");
            // button.classList.add("border-sky_blue_color");
            // button.classList.remove("border-gray-400");
            // button.removeAttribute("disabled");
            $('#show-otp-button').css({
                "background-color":"#1ca3e4",
                "border-color":"#1ca3e4"
            }).prop('disabled', false);
        }
        function otpButtonDeactive(){
            // button.classList.remove("bg-sky_blue_color");
            // button.classList.add("bg-gray-400");
            // button.classList.remove("border-sky_blue_color");
            // button.classList.add("border-gray-400");
            // button.setAttribute("disabled", "disabled");
            $('#show-otp-button').css({
                "background-color":"#9ca3af",
                "border-color":"#9ca3af"
            }).prop('disabled', true);
        }

        function deactiveOTPResendButton(){
            resendOTP.classList.remove("text-orange_color", "decoration-orange_color");
            resendOTP.classList.add("text-gray-400", "decoration-gray-400", "pointer-events-none");
        }

        function activeOTPResendButton(){
            resendOTP.classList.remove("text-gray-400", "decoration-gray-400", "pointer-events-none");
            resendOTP.classList.add("text-orange_color", "decoration-orange_color");
        }

        function isFormValid() {
            var name = $('input[name="name"]').val();
            var phone = $('input[name="phone"]').val();
            var email = $('input[name="email"]').val();
            var password = $('input[name="password"]').val();
            const recaptchaToken = localStorage.getItem("recaptchaToken");

            var nameIsValid = validate(name, [VALIDATOR_REQUIRE()]);
            var phoneIsValid = validate(phone, [VALIDATOR_REQUIRE(),VALIDATOR_PHONE_NUMBER()]);
            var emailIsValid = validate(email, [VALIDATOR_REQUIRE(),VALIDATOR_EMAIL()]);
            var passwordIsValid = validate(password, [VALIDATOR_REQUIRE(),VALIDATOR_MINLENGTH(4)]);

            if (nameIsValid && phoneIsValid && emailIsValid && passwordIsValid && recaptchaToken) {
                userName=name;
                userEmail=email;
                userPhone=phone;
                userPassword=password;
                return true;
            } else {
                return false;
            }
        }

        function phoneSendAuth() {
            const number = "+88"+$('input[name="phone"]').val().trim();
            firebase.auth().signInWithPhoneNumber(number,window.recaptchaVerifier).then(function (confirmationResult) {
                window.confirmationResult=confirmationResult;
                localStorage.setItem("firebaseVerificationId", confirmationResult.verificationId);
            }).catch(function (error) {
                $("#show-message").text(error.message);
                $("#show-message").show();
            });  
        }

        function verifyOTPCode(){
            const inputs = document.querySelectorAll(".input-field input");
            let otpNumber = "";
            inputs.forEach((input) => {
                otpNumber += input.value;
            });
            const firebaseVerificationId = localStorage.getItem("firebaseVerificationId");
            const phoneCredential = firebase.auth.PhoneAuthProvider.credential(firebaseVerificationId,otpNumber)
            firebase.auth().signInWithCredential(phoneCredential)
            .then(function(result) {
                var user = result.user;
                // Clear localStorage after successful verification
                localStorage.removeItem("firebaseVerificationId");
                popUp.style.display = "hidden";
                popUp.style.position = '';
                document.body.style.overflow = '';
                popUp.style.background = '';
                popUp.style.top = '';
                popUp.style.left = '';
                popUp.style.width = '';
                popUp.style.height = '';

                $.ajax({
                    type:'POST',
                    url:"/verifyOTP",
                    data: {
                        _token: '{!! csrf_token() !!}',
                        phone: userPhone
                    },
                    success:function(data) {
                        // $(".otp-show").hide();
                        // $(".otp-show").parent().css("background-color", "white");
                        // $(".otp-close").show();
                        // $("#show-message").html(data.message);
                        window.location.href = "{{ route('home') }}";
                        
                    },
                    error: function(xhr, status, error) {
                        // activeOTPResendButton();
                        // $("#show-message").text(xhr.responseJSON.error);
                        $("#show-message").text("Invalid OTP Number");
                        $("#show-message").show();
                    }
                });
            })
            .catch(function(error) {
                $(".otp-show").hide();
                $(".otp-show").parent().css("background-color", "white");
                $(".otp-close").show();
                $("#show-message").text(error.message);
                $("#show-message").show();
            });
        }
        
        // Disable the button initially
        $('#show-pop-up').css({
            "background": "#9ca3af",
            "border-color": "#9ca3af"
        }).prop('disabled', true);


        // Disable the resend OTP button initially
        $('#show-otp-button').css({
            "background": "#9ca3af",
            "border-color": "#9ca3af"
        }).prop('disabled', true);

        function formValidate(){
            if (isFormValid()) {
                $('#show-pop-up').css({
                    "background-color":"#f85606",
                    "border-color":"#f85606"
                }).prop('disabled', false);
            } else {
                $('#show-pop-up').css({
                    "background-color": "#9ca3af",
                    "border-color": "#9ca3af"
                }).prop('disabled', true);
            }
        }
        
        // Validate the form on keyup or change in any input field
        $('#signup-form').on('keyup change', 'input', function() {
            formValidate();
        });

        function removeRecaptchaToken(){
            var minute = 1;
            var second = 58;
            var countDown = setInterval(function(){
                second -= 1;
                if(second<0){
                    minute -= 1;
                    if(minute<0){
                        clearInterval(countDown);
                        localStorage.removeItem("recaptchaToken");
                        formValidate();
                        return;
                    }
                }
            },1000);
        }

        function otpTimeCount() {
            var minute = 0;
            var second = 10;
            showTimer.textContent = minute + ":" + second;

            var countdown = setInterval(function() {
                second -= 1;

                if (second < 10 && second >= 0) {
                    second = '0' + second;
                }

                if (second <0) {
                    minute -= 1;
                    if (minute < 0) {
                        clearInterval(countdown);
                        otpButtonDeactive();
                        showTimer.textContent = "Your Time Has Been Expired";
                        activeOTPResendButton();
                        return;
                    }
                    second = 59;
                }
                showTimer.textContent = minute + ":" + second;
            }, 1000);
            
            $('#show-otp-button').on('click',function(){
                clearInterval(countdown);
            });
        }

        if (!showPopUp || !popUp) {
            return;
        }

        showPopUp.addEventListener("click", function(event) {
            event.preventDefault();
            // phoneSendAuth();
            // otpTimeCount();

            popUp.style.display = "flex";
            popUp.style.position = 'fixed';
            document.body.style.overflow = 'hidden';
            popUp.style.background = 'rgba(0, 0, 0, 0.8)';
            popUp.style.top = '0';
            popUp.style.left = '0';
            popUp.style.width = '100%';
            popUp.style.height = '100%';

            // OTP input            
            inputs.forEach((input, index1) => {
                input.addEventListener("keyup",(e)=>{
                    var currentInput = input;
                    var nextInput = input.nextElementSibling;
                    var prevInput = input.previousElementSibling;
    
                    if(currentInput.value.length>1){
                        currentInput.value = "";
                        return;
                    }
                    if (nextInput && nextInput.hasAttribute("disabled") && currentInput.value !== "") {
                        nextInput.removeAttribute("disabled");
                        nextInput.focus();
                    }
                    if(e.key === "Backspace"){
                        inputs.forEach((input, index2)=>{
                            if(index1 <= index2 && prevInput){
                                input.setAttribute("disabled",true);
                                input.value="";
                                prevInput.focus();
                            }
                        });
                    }
                    let allFilled = true;
                    inputs.forEach((input) => {
                        if (input.value === "") {
                            allFilled = false;
                        }
                    });

                    if (allFilled) {
                        otpButtonActive();
                    } else {
                        otpButtonDeactive();
                    }
                });
            });
            window.addEventListener("load", () => inputs[0].focus());
        });

        $('#show-otp-button').on('click',function(event){
            event.preventDefault();
            verifyOTPCode();
        });

        $('#show-pop-up').on('click',function(event){
            event.preventDefault();
            $.ajax({
                type:'POST',
                url:"/signup",
                data: {
                    _token: '{!! csrf_token() !!}',
                    name: userName,
                    email: userEmail,
                    phone: userPhone,
                    password: userPassword
                },
                success:function(data) {
                    // $(".otp-show").hide();
                    // $(".otp-show").parent().css("background-color", "white");
                    // $(".otp-close").show();
                    // $("#show-message").html(data.message);
                },
               error: function(xhr, status, error) {
                    $("#show-message").text(xhr.responseJSON.error);
                    $("#show-message").show();
                }
            });
        });

        resendOTP.addEventListener('click',function(event){
            event.preventDefault();
            phoneSendAuth();
            deactiveOTPResendButton();
            // otpTimeCount();
        });
  
        function render() {
            window.recaptchaVerifier=new firebase.auth.RecaptchaVerifier('recaptcha-container', {
                    size: 'normal',
                    callback: function(response) {
                        localStorage.setItem("recaptchaToken",response);
                        removeRecaptchaToken();
                        formValidate();
                    },
                }
            );
            localStorage.setItem("recaptchaVerifier",window.recaptchaVerifier);
            recaptchaVerifier.render();
        }

        window.onload=function () {
            render();
        };

        function emptyInputField(){
            $('input[name="name"]').val("");
            $('input[name="phone"]').val("");
            $('input[name="email"]').val("");
        }

        // Empty the input field when reload the page
        window.addEventListener('load', function() {
            emptyInputField();
        });
  });
</script>

@endsection

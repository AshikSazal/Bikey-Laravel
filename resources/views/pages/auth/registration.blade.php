@extends('app')

@section('content')
    <div class="h-screen mt-[90px]">
        <div class="w-full flex justify-center items-center h-full">
            <x-card class="bg-sky_blue_color w-screen ss:w-2/3 md:w-1/3">
                <form>
                    @csrf
                    <x-input type="text" name="name" placeholder="Enter Your Name" />
                    <x-input type="text" name="phone" placeholder="Enter Your Phone Number" />
                    <x-input type="text" name="email" placeholder="Enter Your E-Mail" />
                    <x-input type="password" name="password" placeholder="Enter Your Password" />
                    <div class="grid justify-center items-center mt-6">
                        <x-button type="submit" class="orange_color" id="show-pop-up">SIGN UP</x-button>
                    </div>
                </form>
                <a class="text-white text-md underline" href="{{route('login')}}">Have an account?Login</a>
            </x-card>
        </div>
    </div>
    <div id="otp" class="hidden z-20 relative justify-center items-center bg-white py-[30px] px-[65px]">
        <div class="absolute bg-white w-[350px] h-[300px] rounded-md">
            <div class="flex justify-center py-4">
                <header class="relative h-[65px] w-[65px] bg-sky_blue_color text-white flex flex-col justify-center items-center rounded-full">
                    <svg class="otp-show" fill="#fff" width="40px" height="40px" viewBox="0 0 36 36" version="1.1"  preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <path d="M31.25,7.4a43.79,43.79,0,0,1-6.62-2.35,45,45,0,0,1-6.08-3.21L18,1.5l-.54.35a45,45,0,0,1-6.08,3.21A43.79,43.79,0,0,1,4.75,7.4L4,7.59v8.34c0,13.39,13.53,18.4,13.66,18.45l.34.12.34-.12c.14,0,13.66-5.05,13.66-18.45V7.59ZM30,15.93c0,11-10,15.61-12,16.43-2-.82-12-5.44-12-16.43V9.14a47.54,47.54,0,0,0,6.18-2.25,48.23,48.23,0,0,0,5.82-3,48.23,48.23,0,0,0,5.82,3A47.54,47.54,0,0,0,30,9.14Z" class="clr-i-outline clr-i-outline-path-1"></path><path d="M10.88,16.87a1,1,0,0,0-1.41,1.41l6,6L26.4,13.77A1,1,0,0,0,25,12.33l-9.47,9.19Z" class="clr-i-outline clr-i-outline-path-2"></path>
                        <rect x="0" y="0" width="36" height="36" fill-opacity="0"/>
                    </svg>
                    <svg class="hidden otp-close" fill="#FF0000" width="40px" height="40px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c-9.4 9.4-9.4 24.6 0 33.9l47 47-47 47c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l47-47 47 47c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-47-47 47-47c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-47 47-47-47c-9.4-9.4-24.6-9.4-33.9 0z"/></svg>
                </header>
            </div>
            <div class="flex justify-center text-red-600" id="show-message"></div>
            <h4 class="flex flex-col items-center justify-center pb-2">Enter OTP Code</h4>
            <div class="flex justify-center">
                <form action="{{route('user.registration')}}" method="POST" id="verify-otp">
                    @csrf
                    <div class="flex gap-3 flex-row justify-center items-center input-field">
                        <input class="h-[45px] w-[42px] rounded-md ouline-none text-xl items-center text-center border border-gray-300 focus:shadow-md" type="number" />
                        <input class="h-[45px] w-[42px] rounded-md ouline-none text-xl items-center text-center border border-gray-300 focus:shadow-md" type="number" disabled />
                        <input class="h-[45px] w-[42px] rounded-md ouline-none text-xl items-center text-center border border-gray-300 focus:shadow-md" type="number" disabled />
                        <input class="h-[45px] w-[42px] rounded-md ouline-none text-xl items-center text-center border border-gray-300 focus:shadow-md" type="number" disabled />
                    </div>
                    <div class="grid justify-center items-center mt-4">
                        <button type="submit" class="relative border-gray-400 px-4 py-[6px] rounded-full text-white group overflow-hidden border-2 bg-gray-400" id="show-otp-button" disabled>
                            <span class="absolute inset-0 bg-white transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 ease-in-out origin-center"></span>
                            <span class="group-hover:text-sky_blue_color relative transition-colors duration-500 ease-in-out">Verify OTP</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    // import { initializeApp } from "firebase/app";
    // import { getAnalytics } from "firebase/analytics";

    // const firebaseConfig = {
    //     apiKey: "AIzaSyDWhrPNSa5qicV64g86nuumvedGodXjWMs",
    //     authDomain: "otp-laravel-bb4ff.firebaseapp.com",
    //     projectId: "otp-laravel-bb4ff",
    //     storageBucket: "otp-laravel-bb4ff.appspot.com",
    //     messagingSenderId: "805078416753",
    //     appId: "1:805078416753:web:7e9d0c38eff735c0fb0ad0",
    //     measurementId: "G-C141Y9N90N"
    // };

    // const app = initializeApp(firebaseConfig);
    // const analytics = getAnalytics(app);

    document.addEventListener("DOMContentLoaded", function() {
        const showPopUp = document.getElementById("show-pop-up");
        const popUp = document.getElementById("otp");

        if (!showPopUp || !popUp) {
            console.error("Button or pop-up element not found.");
            return;
        }

        showPopUp.addEventListener("click", function(event) {
            event.preventDefault();

            popUp.style.display = "flex";
            popUp.style.position = 'fixed';
            document.body.style.overflow = 'hidden';
            popUp.style.background = 'rgba(0, 0, 0, 0.8)';
            popUp.style.top = '0';
            popUp.style.left = '0';
            popUp.style.width = '100%';
            popUp.style.height = '100%';

            // OTP input
            const inputs = document.querySelectorAll(".input-field input");
            const button = document.getElementById("show-otp-button");
            inputs.forEach((input, index1) => {
                input.addEventListener("keyup",(e)=>{
                    const currentInput = input;
                    const nextInput = input.nextElementSibling;
                    const prevInput = input.previousElementSibling;
    
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
                        })
                    }
                    
                    let allFilled = true;
                    inputs.forEach((input) => {
                        if (input.value === "") {
                            allFilled = false;
                        }
                    });

                    if (allFilled) {
                        button.classList.add("bg-sky_blue_color");
                        button.classList.remove("bg-gray-400");
                        button.classList.add("border-sky_blue_color");
                        button.classList.remove("border-gray-400");
                        button.removeAttribute("disabled");
                    } else {
                        button.classList.remove("bg-sky_blue_color");
                        button.classList.add("bg-gray-400");
                        button.classList.remove("border-sky_blue_color");
                        button.classList.add("border-gray-400");
                        button.setAttribute("disabled", "disabled");
                    }
                });
            });
            window.addEventListener("load", () => inputs[0].focus());
        });

        $('#verify-otp').on('submit',function(event){
            event.preventDefault();
            $.ajax({
               type:'POST',
               url:"./registration",
               data: {
                    first: 'hello',
                    _token: '{!! csrf_token() !!}'
                },
               success:function(data) {
                    $(".otp-show").hide();
                    $(".otp-show").parent().css("background-color", "white");
                    $(".otp-close").show();
                    $("#show-message").html(data.message);
               },
               error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });

    });

</script>


@endsection

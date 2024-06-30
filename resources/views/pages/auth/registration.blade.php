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
    <div>
        <x-pop-up />
    </div>
@endsection

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

    document.addEventListener("DOMContentLoaded",function(){
        const showPopUp = document.getElementById("show-pop-up");
        const popUp = document.getElementById("pop-up");
        showPopUp.addEventListener("click", () => {
            console.log("Clicked");
            document.body.style.overflow = 'hidden';
            popUp.style.display="block";
            popUp.style.background = 'rgba(0, 0, 0, 0.8)';
            popUp.style.width = '100%';
            popUp.style.height = '100%';
        });
    })
</script>
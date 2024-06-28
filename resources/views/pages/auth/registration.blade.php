@extends('app')

@section('content')
<div class="h-screen mt-[90px]">
    <div class="w-full flex justify-center items-center h-full">
        <x-card class="bg-sky_blue_color w-screen ss:w-2/3 md:w-1/3">
            <form>
                <x-input type="text" name="name" placeholder="Enter Your Name" />
                <x-input type="text" name="phone" placeholder="Enter Your Phone Number" />
                <x-input type="text" name="email" placeholder="Enter Your E-Mail" />
                <x-input type="password" name="password" placeholder="Enter Your Password" />
                <div class="grid justify-center items-center mt-6">
                    <x-button type="submit" class="orange_color">SIGN UP</x-button>
                </div>
            </form>
            <a class="text-white text-md underline" href="{{route('login')}}">Have an account?Login</a>
        </x-card>
    </div>
</div>
@endsection
@extends('app')

@section('content')
    <div class="h-screen">
        <div class="w-full flex justify-center items-center h-full">
            <x-card class="bg-sky_blue_color w-screen ss:w-2/3 md:w-1/3">
                <form method="POST" action="{{route('user.login')}}">
                    @csrf
                    <x-input type="text" name="email" placeholder="Enter Your E-Mail" />
                    <x-input type="password" name="password" placeholder="Enter Your Password" />
                    <div class="grid justify-center items-center mt-6">
                        <x-button type="submit" class="orange_color" id="show-pop-up">LOGIN</x-button>
                    </div>
                </form>
                <a class="text-white text-md underline" href="{{route('user.signup')}}">Create an account?</a>
            </x-card>
        </div>
    </div>
@endsection
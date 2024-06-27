@extends('app')

@section('content')
<div class="h-screen">
    <div class="w-full flex justify-center items-center h-full">
        <x-card class="bg-sky_blue_color w-screen ss:w-2/3 md:w-1/2">
            <form>
                <x-input type="text" name="email" placeholder="Enter Your E-Mail" />
                <x-input type="password" name="password" placeholder="Enter Your Password" />
                <div class="grid justify-center items-center mt-6">
                    <x-button type="submit" text="LOGIN" class="orange_color">LOGIN</x-button>
                </div>
            </form>
            <a class="text-white text-md underline" href="{{route('registration')}}">Create an account?</a>
        </x-card>
    </div>
</div>
@endsection
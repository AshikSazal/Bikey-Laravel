@extends('app')

@section('content')
<div class="h-screen">
    <div class="w-full flex justify-center items-center h-full">
        <x-card class="bg-sky_blue_color">
            <form>
                <x-input type="text" name="name" placeholder="Enter Your Name" />
                <x-input type="text" name="phone" placeholder="Enter Your Phone Number" />
                <x-input type="text" name="email" placeholder="Enter Your E-Mail" />
                <x-input type="password" name="password" placeholder="Enter Your Password" />
                <div class="grid justify-center items-center">
                    <x-button type="submit" text="LOGIN" class="orange_color">LOGIN</x-button>
                </div>
            </form>
        </x-card>
    </div>
</div>
@endsection
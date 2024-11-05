@extends('admin-app')

@section('content')
    <div class="flex">
        <div class="w-1/4 bg-white border-r border-gray-300 p-4">
            <h2 class="text-xl font-semibold mb-4">USERS</h2>
            <ul class="space-y-2">
                @forelse($customers as $customer)
                    <li>
                        <a href="#" class="block p-2 bg-gray-200 rounded cursor-pointer hover:bg-gray-300">{{ $customer->name }}</a>
                    </li>
                @empty
                    <li class="text-center p-4">
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                            <strong class="font-bold">NO CUSTOMERS FOUND</strong>
                            <span class="block sm:inline">PLEASE CHECK BACK LATER</span>
                        </div>
                    </li>
                @endforelse

                {{-- <li>
                    <a href="#" class="block p-2 bg-gray-200 rounded cursor-pointer hover:bg-gray-300">User 2</a>
                </li>
                <li>
                    <a href="#" class="block p-2 bg-gray-200 rounded cursor-pointer hover:bg-gray-300">User 3</a>
                </li>
                <li>
                    <a href="#" class="block p-2 bg-gray-200 rounded cursor-pointer hover:bg-gray-300">User 4</a>
                </li>
                <li>
                    <a href="#" class="block p-2 bg-gray-200 rounded cursor-pointer hover:bg-gray-300">User 5</a>
                </li> --}}
            </ul>            
        </div>

        <div class="flex-1 p-4">
            <h2 class="text-xl font-semibold mb-4">
                {{ isset($userId) ? "USER " . $userId : "SELECT A USER" }}
            </h2>
            <div class="bg-white border border-gray-300 rounded-lg h-full p-4 overflow-y-auto">
                <div class="space-y-4">
                    <div class="flex">
                        <div class="bg-blue-500 text-white p-2 rounded-lg">Hello!</div>
                    </div>
                    <div class="flex justify-end">
                        <div class="bg-gray-200 text-gray-800 p-2 rounded-lg">Hi there!</div>
                    </div>
                    <div class="flex">
                        <div class="bg-blue-500 text-white p-2 rounded-lg">How are you?</div>
                    </div>
                    <div class="flex justify-end">
                        <div class="bg-gray-200 text-gray-800 p-2 rounded-lg">I'm good, thanks!</div>
                    </div>
                </div>
            </div>
            <div class="mt-4 flex">
                <input type="text" class="border border-gray-300 rounded-lg p-2 w-full" placeholder="Type your message...">
                <button class="bg-blue-500 text-white rounded-lg p-2 ml-2">
                    <svg class="text-white h-5 w-5" height="30" width="30" transform="rotate(55)" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M498.1 5.6c10.1 7 15.4 19.1 13.5 31.2l-64 416c-1.5 9.7-7.4 18.2-16 23s-18.9 5.4-28 1.6L284 427.7l-68.5 74.1c-8.9 9.7-22.9 12.9-35.2 8.1S160 493.2 160 480l0-83.6c0-4 1.5-7.8 4.2-10.8L331.8 202.8c5.8-6.3 5.6-16-.4-22s-15.7-6.4-22-.7L106 360.8 17.7 316.6C7.1 311.3 .3 300.7 0 288.9s5.9-22.8 16.1-28.7l448-256c10.7-6.1 23.9-5.5 34 1.4z"/></svg>
                </button>
            </div>
        </div>
    </div>
@endsection
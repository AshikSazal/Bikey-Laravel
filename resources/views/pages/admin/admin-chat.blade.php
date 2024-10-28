@extends('admin-app')

@section('content')
    <div class="flex h-screen">
        <div class="w-1/4 bg-white border-r border-gray-300 p-4">
            <h2 class="text-xl font-semibold mb-4">Users</h2>
            <ul class="space-y-2">
                <li>
                    <a href="#" class="block p-2 bg-gray-200 rounded cursor-pointer hover:bg-gray-300">User 1</a>
                </li>
                <li>
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
                </li>
            </ul>            
        </div>

        <div class="flex-1 p-4">
            <h2 class="text-xl font-semibold mb-4">Chat with User</h2>
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
            <div class="mt-4">
                <input type="text" class="border border-gray-300 rounded-lg p-2 w-full" placeholder="Type your message...">
            </div>
        </div>
    </div>
@endsection
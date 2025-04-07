<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Telegram Mini App</title>
    {{-- <script src="https://telegram.org/js/telegram-web-app.js"></script> --}}
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>
<body x-data= "{
     open: false,
}" class="bg-white" id="app">
    <div class="text-sky-500 text-2xl font-bold p-4 rounded-lg bg-gray-100 shadow-md flex items-center justify-between">
        <div class="text-black"  @click="open = !open">
            <div x-show="!open">
                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
              </svg>
            </div>
            <div x-show="open" class="p-2 hover:bg-gray-200  border-2 rounded-md cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                  </svg>   
            </div>
        </div>
        <div class="flex flex-row items-center">
            <p class="mr-4">
                {{ Auth::user()->name }}  
            </p> 
            <img src="{{ $photoUrl }}" alt="User Photo" class="rounded-full w-16 h-16">
        </div>
    </div>
    <div  x-show="open"  class ="absolute top-16 left-4 bg-white shadow-lg rounded-lg p-4 z-10">
        <div class="flex justify-end items-center mb-4">
            <div class="p-2 hover:bg-gray-200  border-2 rounded-md cursor-pointer" @click="open = !open">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                  </svg>   
            </div>
                      
        </div>
        <ul>
            <li class="p-2 hover:bg-gray-200 cursor-pointer" @click="open = !open">
                <a href="#">Dashboard</a>
            </li>
            <li class="p-2 hover:bg-gray-200 cursor-pointer" @click="open = !open">
                <a href="#">Logout</a>
            </li>
            <li class="p-2 hover:bg-gray-200 cursor-pointer" @click="open = !open">
                <a href="#">Profile</a>
            </li>
            <li class="p-2 hover:bg-gray-200 cursor-pointer" @click="open = !open">
                <a href="#">Settings</a>
            </li>
            <li class="p-2 hover:bg-gray-200 cursor-pointer" @click="open = !open">
                <a href="#">Help</a>
            </li>
        </ul>
    </div>
    <h1   class="text-2xl">
        {{-- {{ dd(Auth::user()) }} --}}
       welcome   {{ Auth::user()->name }}  
    </h1>

    
</body>
</html>

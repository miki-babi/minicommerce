<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Telegram Mini App</title>
    {{-- <script src="https://telegram.org/js/telegram-web-app.js"></script> --}}
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>
<body class="bg-white" id="app">
    <div class="text-sky-500 text-2xl font-bold p-4 rounded-lg bg-gray-100 shadow-md flex items-center justify-between">
        <div class="text-black" >
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
              </svg>
              
        </div>
        <div cass="flex items-center">
            <p>
                {{ $user['first_name'] }}
            </p> 
            <img src="{{ $user['photo_url'] }}" alt="User Photo" class="rounded-full w-16 h-16 mt-2">
        </div>
        
        {{-- {{ $user['first_name'] }} --}}
    </div>

    
</body>
</html>

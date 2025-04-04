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
    <div class="text-sky-500 text-2xl font-bold p-4 rounded-lg bg-gray-100 shadow-md">
        {{ $user['first_name'] }}
    </div>

    {{-- <script>
        const tg = window.Telegram.WebApp;
        document.getElementById('app').style.backgroundColor = "#ffffff";
    </script> --}}
</body>
</html>

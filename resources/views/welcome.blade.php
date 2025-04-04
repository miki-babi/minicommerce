<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Telegram Mini App</title>
    <script src="https://telegram.org/js/telegram-web-app.js">tg.disableBackgroundOverride();</script>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>
<body class="bg-gray-100" id="app">
    <div class="text-sky-500 text-2xl">
        {{ $user['first_name'] }}
    </div>

    <script>
        const tg = window.Telegram.WebApp;
        tg.disableBackgroundOverride(); // Prevents Telegram from changing your styles
    </script>
</body>
</html>

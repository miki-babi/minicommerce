<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Telegram Mini App</title>
    {{-- <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script> --}}

    {{-- <script src="https://telegram.org/js/telegram-web-app.js"></script> --}}

    <script>
        // Unset Telegram's background styling before rendering
        if (window.Telegram && window.Telegram.WebApp) {
            window.Telegram.WebApp.disableBackgroundOverride();
        }
    </script>
    @vite(['resources/js/app.js', 'resources/css/app.css'])

</head>
<body class="bg-gray-100" id="app">
    <div class="text-sky-500 text-2xl">
        {{-- {{ $user['first_name'] }} --}}
        <div class="p-4 rounded-lg bg-gray-100 shadow-md">
            <h1 class="text-2xl font-bold">Welcome to the Telegram Mini App</h1>
            <p class="mt-2 text-gray-700">This is a simple example of a Telegram mini app.</p>
            <p class="mt-2 text-gray-700">You can customize this app to suit your needs.</p>

            </div>
    </div>

    {{-- <script>
        const tg = window.Telegram.WebApp;
        tg.disableBackgroundOverride(); // Prevents Telegram from changing your styles
    </script> --}}
</body>
</html>

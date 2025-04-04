<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Telegram Mini App</title>

    <script src="https://telegram.org/js/telegram-web-app.js"></script>

    
    @vite(['resources/js/app.js', 'resources/css/app.css'])

</head>
<body class="bg-red-100" id="app">
    <div class="text-sky-500 text-2xl">
        {{-- {{ $user['first_name'] }} --}}
        <div class="p-4 rounded-lg bg-gray-100 shadow-md">
            heello
            </div>
    </div>

    
    <script>
    
    
        document.addEventListener("DOMContentLoaded", function() {
            const tg = window.Telegram.WebApp;
            tg.expand();
    
            if (tg.initDataUnsafe.user) {
                const userId = tg.initDataUnsafe.user.id;
                const firstName = encodeURIComponent(tg.initDataUnsafe.user.first_name);
                const lastName = encodeURIComponent(tg.initDataUnsafe.user.last_name || '');
                const username = encodeURIComponent(tg.initDataUnsafe.user.username || '');
    
                // Use Laravel's route name (manually constructed since JS can't call route() directly)
                const routeName = "{{ route('dashboard') }}";
                window.location.href = `${routeName}?user_id=${userId}&first_name=${firstName}&last_name=${lastName}&username=${username}`;
            }
        });
    
        
    
    
        </script>
</body>
</html>

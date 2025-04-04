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
        <div class="p-4 rounded-lg bg-gray-100 shadow-md">
            heello
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const tg = window.Telegram.WebApp;
            alert(tg);
            tg.expand();

            if (tg.initData.user) {
                const userId = tg.initData.user.id;
                const firstName = encodeURIComponent(tg.initData.user.first_name);
                const lastName = encodeURIComponent(tg.initData.user.last_name || '');
                const username = encodeURIComponent(tg.initData.user.username || '');
                const photoUrl = encodeURIComponent(tg.initData.user.photo_url || '');

                // Alert the values to verify
                alert('User ID: ' + userId);
                alert('First Name: ' + firstName);
                alert('Last Name: ' + lastName);
                alert('Username: ' + username);
                alert('Photo URL: ' + photoUrl);

                // Correct usage of Blade route
                const routeName = "{{ route('dashboard') }}";
                const url = `${routeName}?user_id=${userId}&first_name=${firstName}&last_name=${lastName}&username=${username}&photo_url=${photoUrl}`;
                
                window.location.href = url;
            }
        });
    </script>
</body>
</html>

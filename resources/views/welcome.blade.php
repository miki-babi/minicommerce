<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Telegram Mini App</title>
    <script src="https://telegram.org/js/telegram-web-app.js"></script>
</head>
<body>
    <h1>Welcome, <span id="user-name">User</span></h1>
    <p>Your Telegram ID: <span id="user-id"></span></p>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const tg = window.Telegram.WebApp;
            tg.expand(); // Expand the Mini App

            if (tg.initDataUnsafe.user) {
                document.getElementById("user-name").innerText = tg.initDataUnsafe.user.first_name;
                document.getElementById("user-id").innerText = tg.initDataUnsafe.user.id;
            }
        });
    </script>
</body>
</html>

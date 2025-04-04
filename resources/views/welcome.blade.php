<!--<!DOCTYPE html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1.0">-->
<!--    <title>Telegram Mini App</title>-->
<!--    <script src="https://telegram.org/js/telegram-web-app.js"></script>-->
<!--</head>-->
<!--<body>-->
<!--    <h1>Welcome, <span id="user-name">User</span></h1>-->
<!--    <p>Your Telegram ID: <span id="user-id"></span></p>-->

<!--    <script>-->
    
    
<!--    document.addEventListener("DOMContentLoaded", function() {-->
<!--        const tg = window.Telegram.WebApp;-->
<!--        tg.expand();-->

<!--        if (tg.initDataUnsafe.user) {-->
<!--            const userId = tg.initDataUnsafe.user.id;-->
<!--            const firstName = encodeURIComponent(tg.initDataUnsafe.user.first_name);-->
<!--            const lastName = encodeURIComponent(tg.initDataUnsafe.user.last_name || '');-->
<!--            const username = encodeURIComponent(tg.initDataUnsafe.user.username || '');-->

// Use Laravel's route name (manually constructed since JS can't call route() directly)
<!--            const routeName = "{{ route('dashboard') }}";-->
<!--            window.location.href = `${routeName}?user_id=${userId}&first_name=${firstName}&last_name=${lastName}&username=${username}`;-->
<!--        }-->
<!--    });-->

    


<!--    </script>-->
<!--</body>-->
<!--</html>-->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Telegram Mini App</title>
    <script src="https://telegram.org/js/telegram-web-app.js"></script>
    <style>
        /* Preloader Styles */
        .preloader {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255, 255, 255, 0.8);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        .preloader svg {
            animation: rotate 1s linear infinite;
        }

        @keyframes rotate {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>
<body>
    <!-- Preloader -->
    <div class="preloader">
        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 128 128">
            <path fill="#1695b4" d="M26.9 65.08c3.87 21.1 21.26 37 42.13 37 23.72 0 41.6-20.58 42.95-45.88 1-18.84-9.45-37.5-32.57-47.88A52.2 52.2 0 0 0 47.08 5c22.23-6.02 41.53.02 54.6 10.66 8.2 6.46 16.12 15.33 19.32 24.4a67.13 67.13 0 0 1 3.77 19.85c0 34.4-26.87 62.3-61.26 62.3A62.27 62.27 0 0 1 2.05 70.1c.57-15.82 19.83-18.23 24.83-5.02z"/>
        </svg>
    </div>

    <h1>Welcome, <span id="user-name">User</span></h1>
    <p>Your Telegram ID: <span id="user-id"></span></p>

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
            
            // Redirect to the Laravel route with user data
            window.location.href = `${routeName}?user_id=${userId}&first_name=${firstName}&last_name=${lastName}&username=${username}`;
        }
    });
    </script>
</body>
</html>

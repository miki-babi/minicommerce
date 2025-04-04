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
        <svg xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" 
        xmlns:xlink="http://www.w3.org/1999/xlink" version="1.0" width="512px" height="512px" 
        viewBox="0 0 128 128" xml:space="preserve">
     <g>
       <path fill="#1695b4" d="M26.9 65.08c3.87 21.1 21.26 37 42.13 37 23.72 0 41.6-20.58 42.95-45.88 
         1-18.84-9.45-37.5-32.57-47.88A52.2 52.2 0 0 0 47.08 5c22.23-6.02 41.53.02 54.6 10.66 
         8.2 6.46 16.12 15.33 19.32 24.4a67.13 67.13 0 0 1 3.77 19.85c0 34.4-26.87 62.3-61.26 62.3A62.27 
         62.27 0 0 1 2.05 70.1c.57-15.82 19.83-18.23 24.83-5.02z"/>
       <animateTransform attributeName="transform" type="rotate" from="0 64 64" 
         to="360 64 64" dur="900ms" repeatCount="indefinite"/>
     </g>
   </svg>

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
                // const photourl = encodeURIComponent(tg.initDataUnsafe.user.username || '');
                const photoUrl = encodeURIComponent(tg.initDataUnsafe.user.photo_url || '');
    
                // Use Laravel's route name (manually constructed since JS can't call route() directly)
                const routeName = "{{ route('dashboard') }}";
                window.location.href = `${routeName}?user_id=${userId}&first_name=${firstName}&last_name=${lastName}&username=${username}&photo_url=${photoUrl}`;
            }
        });
    
        
    
    
        </script>
</body>
</html>

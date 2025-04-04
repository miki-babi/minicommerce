<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Telegram Mini App</title>
    <script src="https://telegram.org/js/telegram-web-app.js"></script>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>
<body class="bg-white">
<div class="text-sky-500 text-2xl">
    @php
        // dd($user);
    @endphp
    {{ $user['first_name'] }}
    <!-- Simplicity is the ultimate sophistication. - Leonardo da Vinci -->
    {{-- {{ $user }} {{ $user->last_name }} --}}
    <br>
    {{-- {{ $user->username }} --}}
    <br>
    {{-- {{ $user->id }} --}}
</div>
<body>
<html>
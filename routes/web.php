<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function (Request $request) {
    // Extract user data from request
    $telegramId = $request->input('user_id');
    $firstName = $request->input('first_name');
    $lastName = $request->input('last_name');
    $username = $request->input('username');
    $photoUrl = $request->input('photo_url');

    // Check if user exists
    $user = User::where('telegram_id', $telegramId)->first();

    if (!$user) {
        // Create new user if not found
        $user = User::create([
            'name' => $firstName . ' ' . $lastName,
            'telegram_id' => $telegramId,
            'phone' => null, // Phone is nullable
        ]);
    }

    // Authenticate user
    Auth::loginUsingId($user->id);

    // Store user in session
    Session::put('user', $user);

    return view('dashboard', compact(['user', 'firstName', 'lastName', 'username', 'photoUrl']));
})->name('dashboard');

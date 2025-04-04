<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function (Request $request) {
    // dd($request->all());
    
    $user = [
        'id' => $request->input('user_id'),
        'first_name' => $request->input('first_name'),
        'last_name' => $request->input('last_name'),
        'username' => $request->input('username'),
    ];
dd($user);
    return view('dashboard', compact('user'));
})->name('dashboard');


// Route::get('/dashboard', function (Request $request) {
//     // Decode the Telegram data from the query string
//     $telegramData = json_decode($request->input('telegram_data'), true);
//     $data=$telegramData['user']['first_name'];
// dd( $data);
//     return view('dashboard', compact('telegramData'));
// })->name('dashboard');

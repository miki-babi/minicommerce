<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


Route::get('/', function () {
    // dd('Welcome to the Telegram Bot!');
    return view('welcome');
});
Route::get('/dashboard', function (Request $request) {
    // dd($request->all());
    
    $user = [
        'id' => $request->input('user_id'),
        'first_name' => $request->input('first_name'),
        'last_name' => $request->input('last_name'),
        'username' => $request->input('username'),
        'photo_url' => $request->input('photo_url'),
    ];

    return view('dashboard', compact('user'));
})->name('dashboard');




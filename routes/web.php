<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function(){
    return view('login');
});

Route::get('/register', function(){
    return view('register');
});


Route::get('/register', [RegistrationController::class, 'show']);
Route::post('/register', [RegistrationController::class, 'store']);
<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisterUserController;
use App\Mail\JobPosted;
use Illuminate\Support\Facades\Route;

Route::get('test',function(){
    return new JobPosted;
});

Route::view('/','home');
Route::view('/contact','contact');

Route::resource('jobs',JobController::class);

Route::get('/register',[RegisterUserController::class,'create']);
Route::post('/register',[RegisterUserController::class,'store']);

Route::get('/login',[SessionController::class,'create'])->name('login');
Route::post('/login',[SessionController::class,'store']);
Route::post('/logout',[SessionController::class,'destroy']);
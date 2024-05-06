<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('home',function(){
   return view('home');
});

// Courses Views
Route::prefix('courses')->group(function () {
    Route::get('/', [\App\Http\Controllers\CourseController::class, 'index']);
    Route::get('/id', [\App\Http\Controllers\CourseController::class, 'show']);
});

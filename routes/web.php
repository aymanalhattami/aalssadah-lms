<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('home',function(){
   return view('home');
});

//Route::get('/phpinfo', function () {
//    phpinfo();
//});

// Courses Views
Route::prefix('courses')->group(function () {
    Route::get('/', [\App\Http\Controllers\CourseController::class, 'index']);
    Route::get('/id', [\App\Http\Controllers\CourseController::class, 'show']);
});

// lessons Views
Route::prefix('lessons')->group(function () {
    Route::get('/', [\App\Http\Controllers\LessonController::class, 'index']);
    Route::get('/id', [\App\Http\Controllers\LessonController::class, 'show']);
});


// settings Views
Route::prefix('setting')->group(function () {
    Route::get('/', [\App\Http\Controllers\LessonController::class, 'index']);
});

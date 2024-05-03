<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Courses and lessons
Route::get('courses',[\App\Http\Controllers\CourseController::class,'index'] );
Route::get('lessons',[\App\Http\Controllers\LessonController::class,'index'] );
Route::get('settings',[\App\Http\Controllers\SettingController::class,'index'] );
Route::get('users',[\App\Http\Controllers\UserController::class,'index'] );

// Sanctum
Route::post('register',[\App\Http\Controllers\UserController::class,'register']);
Route::post('login',[\App\Http\Controllers\UserController::class,'login']);
Route::post('logout',[\App\Http\Controllers\UserController::class,'logout'])
    ->middleware('auth:sanctum');

// Free Lessons
Route::get('/lessons/{id}', [\App\Http\Controllers\LessonController::class,'show'])->middleware(['FreeLesson','auth:sanctum']);
Route::get('/course/{id}', [\App\Http\Controllers\CourseController::class,'show'])->middleware(['FreeCourse','auth:sanctum']);

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('courses',[\App\Http\Controllers\CourseController::class,'index'] );
Route::get('lessons',[\App\Http\Controllers\CourseController::class,'index'] );
Route::get('settings',[\App\Http\Controllers\CourseController::class,'index'] );


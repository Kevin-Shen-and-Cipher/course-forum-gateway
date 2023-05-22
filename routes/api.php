<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\AuthController;

Route::apiResource('/posts', PostController::class);
Route::apiResource('/tags', TagController::class);
Route::post('/login', [AuthController::class,'login']);
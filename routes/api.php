<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\AuthController;

Route::apiResource('/posts', PostController::class);
Route::apiResource('/tags', TagsController::class);
Route::apiResource('/tags', AuthController::class);



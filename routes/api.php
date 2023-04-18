<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagsController;

Route::apiResource('/posts', PostController::class);
Route::apiResource('/tags', TagsController::class);



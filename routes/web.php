<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get("/", [MainController::class, 'indexView']);
Route::post("/", [MainController::class, 'saveUrl']);
Route::get("/{url_id}", [MainController::class, 'redirectUrl']);


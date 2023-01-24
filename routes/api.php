<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\BooksController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Authenticating using tokens
Route::post('/login', [AuthController::class, 'login']);
//Getting all books
Route::get('books',[BooksController::class,'books']);

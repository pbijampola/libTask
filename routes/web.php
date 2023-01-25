<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\admin\BookController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\user\CommentController;



Route::get('/', function () {
    return view('welcome2');
});

Auth::routes();

Route::controller(HomeController::class)->group(function () {
    Route::get('/home', 'userIndex')->name('home');
    Route::get('admin/home','adminIndex')->name('admin.route')->middleware('admin');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::resource('/users',UserController::class);
    Route::resource('/books',BookController::class);
});
Route::group(['prefix'=>'user','middleware'=>'auth'],function(){
    Route::get('/book/{id}/show',[CommentController::class,'show'])->name('book.show');
    Route::get('/display-comments',[CommentController::class,'getComments'])->name('comment.display');
    Route::post('/comment',[CommentController::class,'store'])->name('comment.store');

    Route::post('books/{book}/like', [BookController::class,'like'])->name('books.like');
    Route::post('books/{book}/dislike', [BookController::class,'dislike'])->name('books.dislike');

    // Route::post('users/{user}/books/{book}/markAsFavorite', 'BookController@markAsFavorite')->name('users.markAsFavorite');
    // Route::post('users/{user}/books/{book}/unmarkAsFavorite', 'BookController@unmarkAsFavorite')->name('users.unmarkAsFavorite');

    Route::post('/books/{book}/markAsFavorite', [BookController::class,'markAsFavorite'])->name('books.markAsFavorite');
Route::post('/books/{book}/unmarkAsFavorite', [BookController::class,'unmarkAsFavorite'])->name('books.unmarkAsFavorite');

});




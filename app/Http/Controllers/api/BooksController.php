<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function books(){
        $books=Book::orderBy('created_at','desc')->paginate(10);
        return response()->json($books);

    }
}

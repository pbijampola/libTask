<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function userIndex()
    {
        $books = Book::orderBy('created_at','desc')->paginate(12);
        return view('home', compact('books'));
    }
    public function adminIndex()
    {
        $books = Book::orderBy('created_at','desc')->paginate(10);
        return view('books.index', compact('books'));
    }
}

<?php

namespace App\Http\Controllers\user;

use App\Models\Book;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    // public function getComments(){
    //     $comments = Comment::all();
    //     return $comments;
    //     return view('books.show',compact('comments'));
    // }
    public function show($id)
    {
        $book = Book::find($id);
        return view('books.show', compact('book'));

    }

    public function store(Request $request){
        $request->validate([
            'comment'=>'required|string'
        ]);
        $comment= new Comment();
        $comment->user_id= auth()->user()->id;
        $comment->book_id=$request->book_id;
        $comment->comment=$request->comment;
        $comment->save();
        return redirect()->route('home')->with('success','Comment added successfully');
    }
}

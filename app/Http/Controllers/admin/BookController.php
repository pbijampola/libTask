<?php

namespace App\Http\Controllers\admin;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::orderBy('created_at','desc')->paginate(10);
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tilte' => 'required|string|max:255',
            'author' => 'required|string|max:50',
            'short_decs' => 'required|string|max:500',
            'full_decs' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        $book = new Book();
        if($request->hasFile('image')){
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('assets/uploads/books',$filename);
            $book->image=$filename;
        }
        $book->tilte = $request->get('tilte');
        $book->author = $request->get('author');
        $book->short_decs = $request->get('short_decs');
        $book->full_decs = $request->get('full_decs');
        $book->save();
        return redirect()->route('books.index')->with('success', 'Book created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);
        return view('books.show', compact('book'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData=$request->validate([
            'tilte' => 'required|string|max:255',
            'author' => 'required|string|max:50',
            'short_decs' => 'required|string|max:500',
            'full_decs' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        $book = Book::find($id);
        if($request->hasFile('image')){
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('assets/uploads/books',$filename);
            $book->image=$filename;
        }
        $book->update($validatedData);
        return redirect()->route('books.index')->with('success', 'Book updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($id != null){
            $book = Book::where('id',$id);
            $book->delete();
            return redirect()->route('books.index')->with('success', 'Book deleted successfully!');
        }
    //
    }
    //add comment
    // public function addComment($id)
    // {
    //     $book = Book::find($id);
    //     return view('books.comment', compact('book'));
    // }

    //comment
    public function comment(Request $request)
    {
        $request->validate([
            'comment' => 'required|string|max:255',
        ]);
        $book = Book::find($request->get('book_id'));
        $book->addComment($request->get('comment'));
        return redirect()->route('books.index')->with('success', 'Comment added successfully!');
    }
    public function like(Book $book, Request $request)
    {
        $book->like($request->user());

        return back();
    }

    public function dislike(Book $book, Request $request)
    {
        $book->dislike($request->user());

        return back();
    }

    public function markAsFavorite(Book $book, Request $request)
    {
        $book->markAsFavorite($request->user());
        return back();
    }

    public function unmarkAsFavorite(Book $book, Request $request)
    {
        $book->unmarkAsFavorite($request->user());
        return back();
    }
}

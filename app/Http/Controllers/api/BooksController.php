<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * @group Books
     *Get all books
        * @response {
        * "current_page": 1,
        * "data": [
        * {
        * "id": 1,
        * "title": "The Lord of the Rings",
        * "author": "J.R.R. Tolkien",
        * "short description": "The Lord of the Rings is an epic high fantasy novel written by English author and scholar J. R. R. Tolkien. The story began as a sequel to Tolkien's 1937 fantasy novel The Hobbit, but eventually developed into a much larger work. Written in stages between 1937 and 1949, The Lord of the Rings is one of the best-selling novels ever written, with over 150 million copies sold.",
        * "full description": "The Lord of the Rings is an epic high fantasy novel written by English author and scholar J. R. R. Tolkien. The story began as a sequel to Tolkien's 1937 fantasy novel The Hobbit, but eventually developed into a much larger work. Written in stages between 1937 and 1949, The Lord of the Rings is one of the best-selling novels ever written, with over 150 million copies sold.",
        * "created_at": "2021-05-05T09:00:00.000000Z",
        * "updated_at": "2021-05-05T09:00:00.000000Z"
        * },
     */
    public function books(){
        $books=Book::orderBy('created_at','desc')->paginate(10);
        return response()->json($books);

    }
    /**
     * @group Books
     * Get books with most likes
     * @response {
     * "current_page": 1,
     * "data": [
     * {
     * "id": 1,
     * "title": "The Lord of the Rings",
     * "author": "J.R.R. Tolkien",
     * "short description": "The Lord of the Rings is an epic high fantasy novel written by English author and scholar J. R. R. Tolkien. The story began as a sequel to Tolkien's 1937 fantasy novel The Hobbit, but eventually developed into a much larger work. Written in stages between 1937 and 1949, The Lord of the Rings is one of the best-selling novels ever written, with over 150 million copies sold.",
     * "full description": "The Lord of the Rings is an epic high fantasy novel written by English author and scholar J. R. R. Tolkien. The story began as a sequel to Tolkien's 1937 fantasy novel The Hobbit, but eventually developed into a much larger work. Written in stages between 1937 and 1949, The Lord of the Rings is one of the best-selling novels ever written, with over 150 million copies sold.",
     * "created_at": "2021-05-05T09:00:00.000000Z",
     * "updated_at": "2021-05-05T09:00:00.000000Z"
     * },
     *
     */
    public function mostLikedBooks(){
        $books=Book::orderBy('likes','desc')->paginate(10);
        return response()->json($books);
    }
}

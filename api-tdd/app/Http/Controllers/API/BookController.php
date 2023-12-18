<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function __construct(
        private Book $book
    ){}

    public function index()
    {
        return response()->json($this->book->all());
    }

    
}

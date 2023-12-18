<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookController extends Controller
{
    public function __construct(
        private Book $book
    ){}

    public function index()
    {
        return response()->json($this->book->all());
    }

    public function show($bookId)
    {
        $book = $this->book->find($bookId);

        return response()->json($book);
    }

    public function store(Request $request)
    {
        $book = $this->book->create($request->all());

        return response()->json($book, Response::HTTP_CREATED);
    }
}

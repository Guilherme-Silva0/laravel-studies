<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\BookStoreRequest;
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

    public function store(BookStoreRequest $request)
    {
        $book = $this->book->create($request->all());

        return response()->json($book, Response::HTTP_CREATED);
    }

    public function update(Request $request, $bookId)
    {
        $book = $this->book->find($bookId);

        $book->update($request->all());

        return response()->json($book);
    }

    public function destroy($bookId)
    {
        if(!$book = $this->book->find($bookId)) {
            return response()->json(null, Response::HTTP_NOT_FOUND);
        }

        $book->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}

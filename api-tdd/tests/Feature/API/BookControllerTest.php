<?php

namespace Tests\Feature\API;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Book;
use Illuminate\Testing\Fluent\AssertableJson;

class BookControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_book_endpoint(): void
    {
        $books = Book::factory(3)->create();
        $response = $this->getJson('/api/books');

        $response->assertStatus(200);
        $response->assertJsonCount(3);

        $response->assertJson(function (AssertableJson $json) use ($books) {
            $json->hasAll(['0.id', '0.title', '0.isbn']);

            $json->whereAllType([
                '0.id' => 'integer',
                '0.title' => 'string',
                '0.isbn' => 'string',
            ]);

            $json->whereAll([
                '0.id' => $books[0]->id,
                '0.title' => $books[0]->title,
                '0.isbn' => $books[0]->isbn,
            ]);
        });
    }

    public function test_get_single_book_endpoint(): void
    {
        $book = Book::factory()->createOne();
        $response = $this->getJson('/api/books/'.$book->id);

        $response->assertStatus(200);

        $response->assertJson(function (AssertableJson $json) use ($book) {
            $json->hasAll(['id', 'title', 'isbn', 'created_at', 'updated_at']);

            $json->whereAllType([
                'id' => 'integer',
                'title' => 'string',
                'isbn' => 'string',
            ]);

            $json->whereAll([
                'id' => $book->id,
                'title' => $book->title,
                'isbn' => $book->isbn,
            ]);
        });
    }

    public function test_post_book_endpoint(): void
    {
        $book = Book::factory(1)->makeOne();

        $response = $this->postJson('api/books', $book->toArray());

        $response->assertStatus(201);

        $response->assertJson(function (AssertableJson $json) use ($book) {
            
            $json->hasAll(['id', 'title', 'isbn', 'created_at', 'updated_at']);

            $json->whereAll([
                'title' => $book->title,
                'isbn' => $book->isbn,
            ])->etc();
        });
    }
}

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

    public function test_post_book_should_validate_when_try_create_a_invalid_book(): void
    {
        $response = $this->postJson('api/books', []);

        $response->assertStatus(422);

        $response->assertJson(function (AssertableJson $json) {

            $json->hasAll(['message', 'errors']);

            $json->whereAll([
                'errors.title.0'=> 'Este campo é obrigatório',
                'errors.isbn.0'=> 'Este campo é obrigatório',
            ]);

        });
    }

    public function test_put_book_endpoint(): void
    {
        $newBook = Book::factory(1)->createOne();

        $updatedBook = [
            'title' => 'test',
            'isbn' => '1234567890',
        ];

        $response = $this->putJson('api/books/'.$newBook->id, $updatedBook);

        $response->assertStatus(200);

        $response->assertJson(function (AssertableJson $json) use ($updatedBook) {

            $json->hasAll(['id', 'title', 'isbn', 'created_at', 'updated_at']);

            $json->whereAll([
                'title' => $updatedBook['title'],
                'isbn' => $updatedBook['isbn'],
            ])->etc();
        });
    }

    public function test_patch_book_endpoint(): void
    {
        $newBook = Book::factory(1)->createOne();

        $updatedBook = [
            'title' => 'test',
        ];

        $response = $this->putJson('api/books/'.$newBook->id, $updatedBook);

        $response->assertStatus(200);

        $response->assertJson(function (AssertableJson $json) use ($updatedBook) {

            $json->hasAll(['id', 'title', 'isbn', 'created_at', 'updated_at']);

            $json->where('title', $updatedBook['title']);
        });
    }

    public function test_delete_book_endpoint(): void
    {
        $book = Book::factory(1)->createOne();
        $response = $this->deleteJson('api/books/'.$book->id);
        
        $response->assertStatus(204);
    }

    public function test_delete_non_existing_book_endpoint(): void
    {
        $response = $this->deleteJson('api/books/0');
        
        $response->assertStatus(404);
    }
}

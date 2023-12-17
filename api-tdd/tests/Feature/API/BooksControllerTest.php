<?php

namespace Tests\Feature\API;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BooksControllerTest extends TestCase
{
    public function test_books_get_endpoint(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
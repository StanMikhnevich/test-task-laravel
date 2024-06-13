<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Seeder;

class AuthorBooksSeeder extends Seeder
{
    public function run()
    {
        $authors = Author::all()->pluck('id');

        foreach (Book::all() as $book) {
            $book->authors()->sync([
                $authors[rand(0, count($authors)-1)],
                $authors[rand(0, count($authors)-1)],
                $authors[rand(0, count($authors)-1)],
            ]);
        }
    }
}

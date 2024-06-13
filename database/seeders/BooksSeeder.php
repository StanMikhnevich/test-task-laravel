<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class BooksSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('uk_UA');
        $count = 24;
        $books = [];

        for ($i = 1; $i <= $count; $i++) {
            $books[] = [
                'title' => 'Book #' . $i,
                'desc' => 'Lorem ipsum dolor sit amet',
                'image' => Uuid::uuid4() . '.jpg',
                'published_at' => $faker->dateTimeBetween('-50 years', 'now')->format('Y-m-d H:i:s')
            ];
        }

        DB::table('books')->insert($books);
    }
}

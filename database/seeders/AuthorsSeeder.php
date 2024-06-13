<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorsSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('uk_UA');
        $count = 15;

        $authors = [];

        for ($i = 1; $i <= $count; $i++) {
            $authors[] = [
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'father_name' => $faker->firstNameMale,
            ];
        }

        DB::table('authors')->insert($authors);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class UsersSeeder extends Seeder
{
    public function run()
    {
		DB::table('users')->insert([
			[
				'name' => 'ADMIN',
				'email' => 'admin@me.com',
				'password' => '$2y$10$gEIdpm8q2ojdVGWoXyzU8OXcXAhOwG1912.3w9Hq3K6znswokclX.',
			],
		]);
    }
}

<?php

namespace Database\Seeders;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $faker = Faker::create();
        foreach(range(1,100) as $index) {
            DB::table('postings')->insert([
                'title' => $faker->text(40),
                'body' => $faker->text(300),
            ]);
        }
    }
}

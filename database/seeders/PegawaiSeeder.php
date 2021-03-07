<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // faker data indonesia

            // insert data dummy dengan faker
            DB::table('pegawais')->insert([
                'nama' => Str::random(10),
                'alamat' => Str::random(10)
            ]);

        
    }
}

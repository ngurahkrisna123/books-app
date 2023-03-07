<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DB;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create('Lorem');

        for ($i=0; $i < 10000; $i++) { 
            # code...
            DB::table('books')->insert([
                'booksName' => $faker->sentence($nbWords = 2, $variableNbWords = true),
                'category_id' => $faker->numberBetween(1,300),
                'author_id' =>$faker->numberBetween(1,100)
            ]);

        }
    }
}

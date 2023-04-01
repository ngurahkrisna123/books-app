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

        for ($i=0; $i < 100; $i++) { 
            # code...
            DB::table('books')->insert([
                'booksName' => $faker->sentence($nbWords = 2, $variableNbWords = true),
                'booksImage' =>$faker->image('public/storage/images',640,480,null,false),
                'category_id' => $faker->numberBetween(1,10),
                'author_id' =>$faker->numberBetween(1,50)
            ]);

        }
    }
}

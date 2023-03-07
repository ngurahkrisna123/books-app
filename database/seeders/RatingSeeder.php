<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DB;


class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create('Lorem');

        for ($i=0; $i < 50000; $i++) { 
            # code...
            DB::table('rating')->insert([
                
                'books_id' => $faker->numberBetween(1,10000),
                'rating' =>$faker->numberBetween(1,10)
            ]);

        }

    }
}

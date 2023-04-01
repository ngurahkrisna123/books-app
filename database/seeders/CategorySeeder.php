<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Faker\Factory as Faker;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create('Lorem');

        for ($i=0; $i < 10; $i++) { 
            # code...
            DB::table('category')->insert(['category' => $faker->word]);

        }
    }
}

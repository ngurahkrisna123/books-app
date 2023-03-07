<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DB;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create('en_US');

        for ($i=0; $i < 100; $i++) { 
            # code...
            DB::table('author')->insert(['author' => $faker->name]);
        }
    }
}

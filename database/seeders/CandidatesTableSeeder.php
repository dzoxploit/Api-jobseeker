<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CandidatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            DB::table('t_candidate')->insert([
                'email' => $faker->unique()->safeEmail,
                'full_name' => $faker->name,
                'dob' => $faker->date,
                'pob' => $faker->city,
                'gender' => $faker->randomElement(['F', 'M']),
                'year_exp' => $faker->randomDigitNotNull,
                'last_salary' => $faker->numberBetween(30000, 90000),
            ]);
        }
    }
}

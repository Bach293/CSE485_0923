<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use App\Models\Major;
class MajorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('majors')->delete();
        $faker = Faker::create();

        for ($i = 0; $i < 100; $i++) {
            Major::create([
                'id' => $i+1,
                'name' => $faker->name,
                'description' => $faker->sentence,
                'duration' => $faker->numberBetween(1,5),
            ]);
        }
    }
}

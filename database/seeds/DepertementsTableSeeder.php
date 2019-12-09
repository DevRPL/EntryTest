<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Entities\Depertement;

class DepertementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 10) as $i) {
            Depertement::insert(
                [
                    'depertement_name' => $faker->jobTitle,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]
            );
        }
    }
}

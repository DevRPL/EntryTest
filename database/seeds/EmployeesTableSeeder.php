<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Entities\Employee;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 10) as $i) {
            Employee::insert(
                [
                    'nik' => (rand()),
                    'name' => $faker->name,
                    'address' => $faker->address,
                    'email' => $faker->email,
                    'phone' => $faker->phoneNumber,
                    'depertement_id' => rand(1, 10),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]
            );
        }
    }
}

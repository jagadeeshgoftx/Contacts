<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;

class CreateContacts extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('App\Models\Contact');

        for($i = 0; $i <= 10; $i++)
        {
            DB::table('contacts')->insert([
                'name'          => $faker->name,
                'email'         => $faker->email,
                'phone'         => $faker->phoneNumber,
                'address'       => $faker->address,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ]);
        }
    }
}

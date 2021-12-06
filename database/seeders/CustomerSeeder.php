<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seeder = Factory::create('id_ID');
        $data = [];
        for ($i=0; $i<100; $i++) { 
            $gender = $seeder->randomElement(['male','female']);
            $data[] = [
                'email'         => $seeder->email(),
                'first_name'    => $seeder->firstName($gender),
                'last_name'     => $seeder->lastName(),
                'city'          => $seeder->city(),
                'address'       => $seeder->address(),
                'password'      => Hash::make('12345')
            ];
        }
        DB::table('customers')->insert($data);
    }
}

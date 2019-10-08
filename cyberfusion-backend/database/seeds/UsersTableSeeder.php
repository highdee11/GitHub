<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'firstname' => 'Bas',
            'lastname'  => 'Zwaag',
            'address'   => 'Willem Pijperstraat 62',
            'zipcode'   => '1323TL',
            'city'      => 'Almere',
            'country'   => 'NL',
            'profile_image'   => 'https://scontent-amt2-1.xx.fbcdn.net/v/t1.0-9/29595194_599570407064696_6767540082744495924_n.png?_nc_cat=105&_nc_ht=scontent-amt2-1.xx&oh=bf0426b63e8bcf4c43f8f6f8ffa9beab&oe=5CEB6898',
            'email'     => 'info@lefficient.nl',
            'email_verified_at'     => date('Y-m-d H:i:s'),
            'password'  => bcrypt('secret'),
            'created_at'    => date('Y-m-d H:i:s'),
            'updated_at' 	=> date('Y-m-d H:i:s'),
        ]);


    }
}

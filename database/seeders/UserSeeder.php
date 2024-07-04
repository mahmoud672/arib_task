<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert(
            [
                [
                    'fname'     => 'root',
                    'lname'     => 'root',
                    'email'     => 'root',
                    'password'  => Hash::make('123456'),
                    'type'      => 'admin',
                    'image_path'=> 'dashboard/img/avatar5.png'
                ],
                [
                    'fname'     => 'manger',
                    'lname'     => 'manager',
                    'email'     => 'manager@ex.com',
                    'password'  => Hash::make('123456'),
                    'type'      => 'manager',
                    'image_path'=> 'dashboard/img/avatar5.png'
                ],

            ]
        );
    }
}

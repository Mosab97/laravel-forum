<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name' => 'Mosab',
            'email'=> 'test@test.com',
            'password' => \Illuminate\Support\Facades\Hash::make('test@test.com'),

        ]);


        \App\User::create([
            'name' => 'Mosab2',
            'email'=> 'test2@test.com',
            'password' => \Illuminate\Support\Facades\Hash::make('test2@test.com'),

        ]);

    }
}

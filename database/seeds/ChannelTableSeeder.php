<?php

use Illuminate\Database\Seeder;

class ChannelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Channel::create([
            'name' => 'laravel 5.8',
            'slug' => str_slug('laravel 5 8','-')
        ]);


        \App\Channel::create([
            'name' => 'Vue js 3',
            'slug' => str_slug('Vue js 3','-')
        ]);


        \App\Channel::create([
            'name' => 'Angular 7',
            'slug' => str_slug('Angular 7','-')
        ]);


        \App\Channel::create([
            'name' => 'Node js',
            'slug' => str_slug('Node js','-')
        ]);



    }
}

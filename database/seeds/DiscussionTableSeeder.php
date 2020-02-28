<?php

use Illuminate\Database\Seeder;

class DiscussionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Discussion::create([
            'user_id' => 1,
           'title' => "Dis 1",
            'content' => "test content",
            'slug' => str_slug( "And this will return to us the path of that file",'-'),
            'channel_id' =>1,
            'reply_id' => null
        ]);

        \App\Discussion::create([
            'user_id' => 2,
            'title' => "Dis 2",
            'content' => "test content",
            'slug' => str_slug( "And 22 this will return to us the path of that file",'-'),
            'channel_id' =>3,
            'reply_id' => 1

        ]);


    }
}

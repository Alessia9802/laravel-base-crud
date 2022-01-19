<?php

use App\Model\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         $posts = config('db.comics');

        foreach ($posts as $post) {
            $_post = new Post();
            $_post->title = $post['title'];
            $_post->description = $post['description'];
            $_post->thumb = $post['thumb'];
            $_post->price = $post['price'];
            $_post->series = $post['series'];
            $_post->save();
        }
        
    }
}

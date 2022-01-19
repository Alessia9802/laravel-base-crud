<?php

use App\Models\Post;
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
         $series = config('db');

        foreach ($series as $serie) {
            $_serie = new Post();
            $_serie->title = $serie['title'];
            $_serie->description = $serie['description'];
            $_serie->thumb = $serie['thumb'];
            $_serie->price = $serie['price'];
            $_serie->series = $serie['series'];
            $_serie->save();
        }
        
    }
}

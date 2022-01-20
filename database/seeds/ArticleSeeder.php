<?php

use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use App\Models\Article;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //
        for ($i = 0; $i < 10; $i++) {
            $article = new Article();
            $article->title = $faker->sentence();
            $article->body = $faker->paragraphs(10, true);
            $article->save();
        }
    }
}

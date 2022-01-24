<?php

use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use App\Models\Character;

class CharacterSeeder extends Seeder
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
            $character = new Character();
            $character->title = $faker->sentence();
            $character->cover = $faker->imageUrl(300, 200, 'Characters');
            $character->desc = $faker->paragraphs(10, true);
            $character->save();
        }
    }
}

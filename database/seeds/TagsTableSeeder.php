<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            'Easy to prepare',
            'Veggie',
            'Vegan',
            'Gluten free'
        ];

        foreach($tags as $tag_name) {
            $new_tag = new Tag();
            $new_tag->name = $tag_name;
            $new_tag->slug = Str::slug($new_tag->name, '-');
            $new_tag->save();

        }
    }
}

<?php

use Illuminate\Database\Seeder;
use App\Tag;
use App\Post;
use Illuminate\Support\Facades\DB;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::Table('tags')->delete();

        $php = new Tag();
        $php->name="PHP";
        $php ->Save();

        $mapping = new Tag();
        $mapping->name="Mapping";
        $mapping ->Save();



      $tags = [

        $php->id,
        $mapping->id,
      ];

        foreach(Post::all() as $post)
        {
            shuffle($tags);

                for ($i = 0; $i < rand(0, count($tags)-1); $i++){

                        $post->tags()->detach($tags[$i]);
                        $post->tags()->attach($tags[$i]);
                }

        }
    }

}


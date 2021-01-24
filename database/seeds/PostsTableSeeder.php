<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        {
            
            //reset the users table
            
            DB:: table('posts')->delete();
    
    
            //generate dummpy posts
    
            $posts = [];
            $faker = Factory::create();
    
            for ($i=1; $i<=10; $i++) 
            {
                $image = 'Post_Image_'.rand(1,5).'.jpg';
    
                
                $posts[]=[
                    'author_id'=> 1,
                    'title'=> $faker->sentence(rand(5,8)),
                    'excerpt'=> $faker->text(rand(205,208)),
                    'body'=> $faker->paragraphs(rand(10,15),true),
                    'slug'=> $faker->slug(),
                    'image'=> rand(0,1)== 1 ? $image :NULL,
                    'created_at'=> new DateTime(),
                    'updated_at'=> new DateTime(),
                    'published_at'=> new DateTime(),
                    'view_count'=>rand(1,10)*10,
    
    
                ];
    
            }
    
            DB::table('posts')->insert($posts);
        };
    
        
    
                for ($post_id = 1; $post_id <= 10; $post_id++)
                {
    
                    $category_id = 1;
    
                    DB::table('posts')->where('id', $post_id)-> update(['category_id'=> $category_id]);
    
                }
    
    
    
}
}
    

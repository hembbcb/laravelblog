<?php

namespace App\Providers;

use App\Post;
use Illuminate\Support\ServiceProvider;
use App\Category;
use App\Tag;

class composerBlogServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
       
        view()->composer('layouts.sidebar', function($view){

            $tags = Tag::all();


            return $view->with('tags', $tags);
        });

        view()->composer('layouts.sidebar', function($view){

            $categories = Category::with('posts')->orderBy('title', 'asc')->get();

        $posts = Post::with('author')
                    ->latestFirst()
                    ->simplePaginate(3);

            return $view->with('categories', $categories);
        });
       
        view()->composer('layouts.sidebar', function($view){

            $popularPosts = Post::with('author')
                        ->popular()
                        ->simplePaginate(3);

            return $view->with('popularPosts', $popularPosts);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

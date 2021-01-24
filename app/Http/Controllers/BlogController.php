<?php

namespace App\Http\Controllers;
use App\Category;
use App\Post;
use App\User;
use Tag;

class BlogController extends Controller
{

    protected $limit = 2;
    public function index()
    {
        $categories = Category::with('posts')->orderBy('title', 'asc')->get();

        $posts = Post::with('author')
                    ->latestFirst()
                    ->published()
                    ->filter(request('term'))
                     ->simplePaginate($this->limit);

        return view("blog.index", compact('posts', 'categories'));
    }

    public function category($id)
    {
        $categories = Category::with('posts')->orderBy('title', 'asc')->get();

        $posts = Post::with('author')
                    ->latestFirst()
                    ->where('category_id', $id)
                    ->simplePaginate($this->limit);

         return view("blog.index", compact('posts'));

    }

    public function tag(Tag $id)
    {
        $tag = Post::with('tags')->orderBy('title', 'asc')->get();

        $posts = Post::with('author')
                    ->latestFirst()
                    ->published()
                    ->simplePaginate($this->limit);

         return view("blog.index", compact('posts'));

    }

    public function show(Post $post)

    {


        // upadte post with view count

        $post->increment('view_count');
        
        return view('blog.show', compact('post'));
    }

        
}
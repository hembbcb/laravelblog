<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Intervention\Image\Facades\Image;

use App\Http\Requests;

class BackendBController extends BackendController
{
    
    protected $uploadPath;
    protected $limit = 6;


    public function __construct()
    {
        parent::__construct();

        $this->uploadPath = public_path(config('cms.image.directory'));
    }
    
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        

        if(($status = $request->get('status')) && $status =='trash')
        
        {
            $posts = Post::onlyTrashed()->with('category','author')->paginate($this->limit);
            $onlyTrashed = TRUE;

        } 
        elseif ($status == 'draft')
        {
            $posts = Post::draft()->with('category','author')->paginate($this->limit);
            $onlyTrashed = FALSE;
        }
        elseif ($status == 'scheduled')
        {
            $posts = Post::scheduled()->with('category','author')->paginate($this->limit);
            $onlyTrashed = FALSE;
        }
        elseif ($status == 'published')
        {
            $posts = Post::published()->with('category','author')->paginate($this->limit);
            $onlyTrashed = FALSE;
        }
        else
        {
            $posts = Post::with('category','author')->paginate($this->limit);
            $onlyTrashed = FALSE;
        }

            return view('backend.blog.index', compact('posts', 'onlyTrashed'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post();
        return view ('backend.blog.create', compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [

            'title' =>'required',
            'category_id' =>'required',
            'slug' =>'required|unique:posts',
            'excerpt' =>'required',
            'body' =>'required',
            'author_id' => 'required',
            'published_at' => 'date_format: Y-m-d H:i:s',
            'image' => 'mimes:jpg,jpeg,bmp,png,gif',
        ]);
    
        $data = $this ->handleRequest($request);
    
       $newPost = $request->user()->posts()->create($data);
       $newPost ->createTags($data["post_tags"]);
    
         return redirect(route('backend.blog.index'))->with('message', 'Your post was created successfully !');
    }
    
    
    private function handleRequest($request){
    
    
        $data = $request->all();
    
        if ($request->hasFile('image')) {
            $image = $request ->file('image');
            $fileName = $image->getClientOriginalName();
            $destination = $this ->uploadPath;
            $successUploaded = $image->move($destination, $fileName);
    
            if ($successUploaded){
    
                $width = config('cms.image.thumbnail.width');
                $height = config('cms.image.thumbnail.height');
                $extenstion = $image->getClientOriginalExtension();
                $thumbnail = str_replace(".{$extenstion}", "_thumb.{$extenstion}", $fileName);
    
                Image::make($destination .'/'. $fileName )
                                    ->resize($width, $height)
                                    ->save($destination .'/'. $thumbnail);
            }
    
    
            $data['image'] = $fileName;
    
        }
    
        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
         
        return view('backend.blog.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [

            'title' =>'required',
            'category_id' =>'required',
            'slug' =>'required',
            'excerpt' =>'required',
            'body' =>'required',
            'author_id' => 'required',
            'published_at' => 'date_format: Y-m-d H:i:s',
            'image' => 'mimes:jpg,jpeg,bmp,png,gif',
        ]);

        $post = Post::findOrFail($id);
        $oldImage = $post->image;
        $data = $this->handleRequest($request);
        $post->update($data);
        $post->createTags($data['post_tags']);

        if ($oldImage !== $post->image) {

            $this->removeImage($oldImage);
        }

        return redirect(route('backend.blog.index'))->with('message', 'Your post was updated successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Post::findOrFail($id)->delete();
        return redirect(route('backend.blog.index'))->with('trash-message',[ 'Your post is successfully moved to trash ! ', $id] );
    }


    public function restore($id)
    {

        $post = Post::withTrashed()->findOrFail($id);
        $post->restore();
        return redirect ( route('backend.blog.index'))->with('message','Your post is successfully  restored from trash ! ' );
    }


    public function forceDestroy($id)
    {

        $post = Post::withTrashed()->findOrFail($id);
        $post->forceDelete();

        $this->removeImage($post->image);
        
        return redirect ( route('backend.blog.index'))->with('message','Your post is successfully  deleted from trash ! ' );
    }


    private function removeImage($image){
       
        if (! empty($image)) 
       
        {
              
            $imagePath = $this->uploadPath.'/'. $image;
            $extenstion = substr(strrchr($image,'.'),1);
            $thumbnail = str_replace(".{$extenstion}", "_thumb.{$extenstion}", $image);
            $thumbnailPath = $this->uploadPath.'/'. $thumbnail;

            if (file_exists($imagePath)) unlink($imagePath);
            if (file_exists($thumbnailPath)) unlink($thumbnailPath);
        }
    }
}

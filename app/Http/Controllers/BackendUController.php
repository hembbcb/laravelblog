<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Intervention\Image\Facades\Image;
use App\Post;

use App\Http\Requests;

class BackendUController extends BackendController
{


    protected $uploadUPath;


    public function __construct()
    {
        parent::__construct();

        $this->uploadUPath = public_path(config('cms.profile.directory'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('name')->paginate(5);
        return view('backend.users.index', compact ('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();
        return view('backend.users.create', compact ('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\UserStoreRequest $request)
    {
    

        $data = $this ->handleRequest($request);
        $data['password'] = bcrypt($data['password']);
        $request->user()->create($data);
     
          return redirect(route('backend.users.index'))->with('message', 'New user was created successfully !');
     }
     
     
     private function handleRequest($request){
     
     
         $data = $request->all();
     
         if ($request->hasFile('profile')) {
             $profile = $request ->file('profile');
             $fileName = $profile->getClientOriginalName();
             $destination = $this ->uploadUPath;
             $successUploaded = $profile->move($destination, $fileName);
     
             if ($successUploaded){
     
                 $width = config('cms.profile.thumbnail.width');
                 $height = config('cms.profile.thumbnail.height');
                 $extenstion = $profile->getClientOriginalExtension();
                 $thumbnail = str_replace(".{$extenstion}", "_thumb.{$extenstion}", $fileName);
     
                 Image::make($destination .'/'. $fileName )
                                     ->resize($width, $height)
                                     ->save($destination .'/'. $thumbnail);
             }
     
     
             $data['profile'] = $fileName;
     
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
        $user = User::findOrFail($id);
         
        return view('backend.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\UserUpdateRequest $request, $id)
    {
       
        $user = User::findOrFail($id);
        $oldProfile = $user->profile;
        $data = $this->handleRequest($request);
        $user->update($data);

        if ($oldProfile !== $user->profile) {

            $this->removeImage($oldProfile);
        }

        return redirect('backend/users')->with('message', 'The user details was updated successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::where('author_id', $id)->update(['author_id' => config('cms.default_user_id')]);
        $user = user::findOrFail($id);
        $user->delete();
        return redirect('/backend/users')->with('trash-message', 'Your   user was successfully deleted ! ' );
    }

    private function removeImage($profile){
       
        if (! empty($profile)) 
       
        {
              
            $imagePath = $this->uploadUPath.'/'. $profile;
            $extenstion = substr(strrchr($profile,'.'),1);
            $thumbnail = str_replace(".{$extenstion}", "_thumb.{$extenstion}", $profile);
            $thumbnailPath = $this->uploadUPath.'/'. $thumbnail;

            if (file_exists($imagePath)) unlink($imagePath);
            if (file_exists($thumbnailPath)) unlink($thumbnailPath);
        }
    }
}

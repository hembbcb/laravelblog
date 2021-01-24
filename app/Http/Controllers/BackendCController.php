<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Category;
use Illuminate\Http\Request\CategoryDestroyRequest;
use App\Post;

class BackendCController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::with('posts')->orderBy('title')->paginate(5);
        return view('backend.categories.index', compact ('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = new Category();
        return view('backend.categories.create', compact ('category'));
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

            'title' => 'required| unique:categories| max:255',
            'slug' => 'required|unique:categories| max:255',
        ]);

        Category::create($request->all());
        return redirect('/backend/categories')->with('message', "New Category was created successfully");
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
        $category = Category::findOrFail($id);
         
        return view('backend.categories.edit', compact('category'));
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

            'title' => 'required|max: 255 | unique:categories',
            'slug' => 'required|max: 255 | unique:categories',
        ]);

        Category::create($request->all());
        return redirect('/backend/categories')->with('message', "Category was updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requests\CategoryDestroyRequest $request, $id)
    {
        Post::where('category_id', $id)->update(['category_id' => config('cms.default_category_id')]);

        $category = Category::findOrFail($id);
        $category->delete();
        return redirect('/backend/categories')->with('trash-message', 'Your   Category was successfully deleted ! ' );
    }
}

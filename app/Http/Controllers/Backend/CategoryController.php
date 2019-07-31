<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use App\Post;

class CategoryController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('title')->paginate($this->limit);
        $categoriesCount = Category::count();
        return view('backend.category.index', compact('categories', 'categoriesCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\CategoryRequest $request)
    {
        $category = new Category;
        $category->title = $request->title;
        $category->slug = $request->slug;
        $category->save();
        return redirect('/backend/category/index')->with('message', 'Your category has been added successfully');
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
        if ($id != 21) {
            $category = Category::find($id);
            return view('backend.category.editform', compact('category'));
        } else
            return redirect()->back()->with('error-message', "You cannot edit the default category");
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
        if (!$id != 21) {
            $category = Category::findOrFail($id);
            $category->title = $request->title;
            $category->slug = $request->slug;
            $category->save();
            return redirect('/backend/category/index')->with('message', "Category edited successfully");
        } else
            return redirect('/backend/category/index')->with('error-message', "You cannot edit the default category");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($id != 21) {
            Post::where('category_id', $id)->update(['category_id' => 21]);
            $category = Category::find($id);
            $category->delete();
            return redirect('/backend/category/index')->with('message', 'Category deleted successfully');
        } else
            return redirect('/backend/category/index')->with('error-message', "You cannot delete the default category");
    }
}

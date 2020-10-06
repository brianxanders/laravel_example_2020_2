<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use Illuminate\Http\Request;
use Throwable;

class CategoryController extends Controller
{

    /** Set permission methods */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create category',['only'=>['create','store']]);
        $this->middleware('permission:edit category',['only'=>['edit', 'update']]);
        $this->middleware('permission:delete category',['only'=>['delete','destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStoreRequest $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->save();
        return redirect()->route('categories.index')->with('message', 'categorie toegevoegd');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('admin.categories.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, Category $category)
    {
        $category->name = $request->name;
        $category->save();

        return redirect()->route('categories.index')->with('message','Categorie geupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */

    public function delete(Category $category)
    {
        return view('admin.categories.delete',compact('category'));
    }

    public function destroy(Category $category)
    {
        try {
            $category->delete();
        }catch (Throwable $e){
            report($e);
            return redirect()->route('categories.index')->with('wrong', 'categorie kon niet worden verwijderd omdat er nog boeken in stonden');
        }
        return redirect()->route('categories.index')->with('message', 'categorie verwijderd');
    }
}

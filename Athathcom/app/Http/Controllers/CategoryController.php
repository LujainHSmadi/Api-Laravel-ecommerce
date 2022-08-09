<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $categories = Category::with('children')
        //     ->whereNull('parent_category_id')
        //     ->get();
        // $categories = Category::with('children')
        //     ->where('parent_category_id','=','1')
        //     ->get();


    //     $categories = Category::with('children')
    // ->where('parent_category_id', '0')->orWhere('parent_category_id', '>', 0)->get();
    $category = Category::all();

        return response()->json($category);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->parent_category_id = $request->parent_category_id;
        $category->description = $request->description;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $ex = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ex;
            $file->move('uploads/category', $filename);
            $category->image = $filename;
        }
        $category->save();
        return response()->json($category);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $categories = Category::with('children')
        //     ->where('parent_category_id', $id)
        //     ->get();
        $category = Category::find($id);
        return response()->json($category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $category = Category::find($id);
        $category->name = $request->name ?? $category->name;
        $category->parent_category_id = $request->parent_category_id ?? $category->parent_category_id;
        $category->description = $request->description ?? $category->description;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $ex = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ex;
            $file->move('uploads/category', $filename);
            $category->image = $filename;
        }
        $category->update();
        return response()->json($category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        // return responce()->json();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        return response()->json($product);
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
        $product = new Product();
        $product->name = $request->name ?? $product->name;
        $product->price = $request->price ?? $product->price;
        $product->quantity = $request->quantity ?? $product->quantity;
        $product->caregory_id = $request->caregory_id ?? $product->caregory_id;
        $product->description = $request->description ?? $product->description;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $ex = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ex;
            $file->move('uploads/product', $filename);
            $product->image = $filename;
        }

        $product->save();
        return response()->json($product);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return response()->json($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->name ?? $product->name;
        $product->price = $request->price ?? $product->price;
        $product->quantity = $request->quantity ?? $product->quantity;
        $product->caregory_id = $request->caregory_id ?? $product->caregory_id;
        $product->description = $request->description ?? $product->description;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $ex = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ex;
            $file->move('uploads/product', $filename);
            $product->image = $filename;
        }
        $product->update();
        return response()->json($product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product = Product::find($id);
        $product->delete();

    }

    public function search($id)
    {
        $product = Product::where('name', 'like', '%' .$id . '%')->get();
        return response()->json($product);
    }
}

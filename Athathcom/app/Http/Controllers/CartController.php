<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::id()) {
            $cartItems = Cart::orderBy('carts.id', 'ASC')
                ->where('user_id', auth()->user()->id)
                ->join('users', 'carts.user_id', '=', 'users.id')
                ->join('products', 'carts.product_id', '=', 'products.id')
                ->get(['carts.id', 'carts.sub_total', 'carts.quantity', 'products.image', 'products.name', 'products.price']);

            $total = Cart::where('user_id', auth()->user()->id)->pluck('sub_total')->sum();
            // dd($total);
            return response()->json(['cartItems' => $cartItems, 'total' => $total]);

        } else {
            return response()->json(['message' => 'You must login to see this page']);
        }

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
        if (Auth::id()) {

            $price = Product::find($request->id);
            if ($cart = Cart::where('user_id', auth()->user()->id)->Where('product_id', $request->id)->first()) {
                
                $cart->quantity = $cart->quantity + $request->quantity;
                $cart->sub_total = $cart->sub_total + (($request->quantity) * ($price->price ?? 0));
                $subtotal = Cart::where('user_id', auth()->user()->id)->pluck('sub_total')->sum();
                $cart->update();
                return response()->json(['message' => 'Cart updated successfully', 'cart' => $cart]);
            } else {
                $cart = new Cart();
                $cart->user_id = auth()->user()->id;
                $cart->product_id = $request->id;
                $cart->price = $price->price ?? 0;
                $cart->quantity = $request->quantity;
                $cart->sub_total = ($request->quantity) * ($price->price ?? 0);
                $cart->save();
                return response()->json(['message' => 'Cart added successfully', 'cart' => $cart]);

            }
        } else {
            return response()->json(['message' => 'You must login to see this page']);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        $cart = Cart::find($id);
        $cart->quantity = (($cart->quantity) + $request->quantity);
        $cart->sub_total = ($cart->quantity) * ($cart->price);
        $cart->update();
        return response()->json(['message' => 'Cart updated successfully', 'cart' => Cart::find($id)]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        $cart = Cart::find($cart->id);
        $cart->delete();
    }
}

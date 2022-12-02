<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function addToCart($id){
        $cart = Cart::where('product_id',$id)->where('user_id',Auth::id())->first();
        if($cart){
          $cart->quantity++;
          $cart->total_amount = $cart->rate * $cart->quantity;
          $cart->net_amount =($cart->rate - (($cart->rate * $cart->discount) /100))*$cart->quantity;
        //   $cart->net_amount = ($->rate * $cart->quantity) - (($product->rate * $product->discount) /100);
          $cart->save();
          $status = "Product Updated Successfully";
        }
        else{
            $product =  Product::findOrfail($id);
            $cart = new Cart;
            $cart->product_id = $product->id;
            $cart->user_id = Auth::id();
            $cart->quantity = 1;
            $cart->rate = $product->rate;
            $cart->total_amount = $product->rate * 1;
            $cart->discount = $product->discount;
            $cart->net_amount = ($product->rate * 1) - (($product->rate * $product->discount) /100);
            $cart->save();
            $status = "Product Inserted Successfully";    
        }
        return redirect()->route('product.home')->with("success","$status");
    }
    public function buyNow($id){
        $product = Product::findOrfail($id);
        $product->quantity--;
        $product->save();
        $status = "Item Bought Successfully !";
        return redirect()->route('product.home')->with("success", $status);
    }
    public function index()
    {
        return view('cart.index',["cart_items"=>Cart::where('user_id',Auth::id())->with('product')->get()]);    
        // return view('cart.index',["products"=>Product::getData(true)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function increaseQuantity($id){
        $cart = Cart::findOrfail($id);
        $cart->quantity++;
        $cart->total_amount = $cart->rate * $cart->quantity;
        $cart->net_amount =($cart->rate - (($cart->rate * $cart->discount) /100))*$cart->quantity;
        $cart->save();
        return redirect()->route('cart.index');
    }
    public function decreaseQuantity($id){
        $cart = Cart::findOrfail($id);
        if($cart->quantity==1)
        {
            $cart->delete();
            return redirect()->route('cart.index');
        }
        $cart->quantity--;
        $cart->total_amount = $cart->rate * $cart->quantity;
        $cart->net_amount =($cart->rate - (($cart->rate * $cart->discount) /100))*$cart->quantity;
        $cart->save();
        return redirect()->route('cart.index');
    }
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $cart = Cart::findOrFail($id);
        $cart->delete();
        return redirect()->route("cart.index")->with("success","Product deleted successfully");
    }

}

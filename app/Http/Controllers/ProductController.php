<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Product::getData(true);
        return view('product.index',["products"=>Product::getData(true)]);

        // return Product::all(); //returns everything from the Product model
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('product.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //    return $request;
        // dd($request->pName);

        // $data = new Product();
        // $data->pName = $request->pName;
        // $data->quantity = $request->quantity;
        // $data->rate = $request->rate;
        // $data->discount = $request->discount;

        // $data->save();
        // return redirect()->route('product.index');
        $request->validate([
            "pName"=>"required|string",
            "quantity"=>"required|numeric",
            "rate"=>"required|numeric",
            "discount"=>"required|numeric",
        ]);
        $product = Product::create(
            [
                "pName"=> $request->pName,
                "quantity" =>$request->quantity,
                "rate"=> $request->rate,
                "discount"=>$request->discount,
                "user_id"=>Auth::id(),
            ]
            );
            if(!$product)
            {
                return back()->with("error","error message");
            }
            return redirect()->route("product.index")->with("success","Product inserted Successfully");
     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
    //    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $product =  Product::findOrfail($id);
        return view("product.edit",["product"=>$product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $product = Product::findOrfail($id);
        $product->update([
            "pName"=> $request->pName,
            "quantity" =>$request->quantity,
            "rate"=> $request->rate,
            "discount"=>$request->discount,
      
        ]);
        if(!$product)
        {
            return back()->with("error","error message");
        }
        return redirect()->route("product.index")->with("success","Product updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route("product.index")->with("success","Product deleted successfully");
    }

    public function home(){
        return view('product.home',["products"=>Product::all()]);  
    }  
}

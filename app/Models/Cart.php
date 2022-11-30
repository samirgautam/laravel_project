<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Cart extends Model
{
    use HasFactory;

    //  public function product(){
    //     return $this->hasMany(Product::class);
    //  }

    // static public function getProduct($status){
    //     return self::where('product_id',$status)->with('product')->get();
    // }

    public static function getCartCount(){
        return self::where('user_id',Auth::id())->count();
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

}

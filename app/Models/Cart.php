<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

     public function product(){
        return $this->hasMany(Product::class);
     }

    static public function getProduct($status){

        return self::where('product_id',$status)->with('product')->get();
    }

}

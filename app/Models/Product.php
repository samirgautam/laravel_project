<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory; //trait php doesn't support multiple inheritance

    protected $fillable =[
        'pName',
        'quantity',
        'rate',
        'discount',
        'user_id'
    ];


    public function user(){
        return $this->belongsTo(User::class);
     }
       
    static public function getData($status){
        return self::where('is_active',$status)->with('user')->get();  
}

}

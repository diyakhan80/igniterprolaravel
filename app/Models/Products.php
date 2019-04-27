<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';
    protected $fillable = ['name','slug','image','status','created_at','updated_at'];

    public static function change($userID,$data){
        $isUpdated = false;
        $table_products = \DB::table('products');
        if(!empty($data)){
            $table_products->where('id','=',$userID);
            $isUpdated = $table_products->update($data); 
        }
                
        return (bool)$isUpdated;
    }
}

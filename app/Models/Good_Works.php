<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Good_Works extends Model
{
    protected $table = 'good_works';
    protected $fillable = ['title','description','image','status','created_at','updated_at'];

    public static function change($userID,$data){
        $isUpdated = false;
        $table_products = \DB::table('good_works');
        if(!empty($data)){
            $table_products->where('id','=',$userID);
            $isUpdated = $table_products->update($data); 
        }
                
        return (bool)$isUpdated;
    }
}

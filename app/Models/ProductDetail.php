<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    protected $table = 'product_detail';
    protected $fillable = ['product_id','url','username','password','type','status','created_at','updated_at'];

    public static function change($userID,$data){
        $isUpdated = false;
        $table_products = \DB::table('product_detail');
        if(!empty($data)){
            $table_products->where('id','=',$userID);
            $isUpdated = $table_products->update($data); 
        }
                
        return (bool)$isUpdated;
    }

    public function product(){
        return $this->hasOne('App\Models\Products','id','product_id');
    }

    public static function list($fetch='array',$where='',$keys=['*'],$order='id-desc'){
        $table_product_details = self::select($keys)
        ->with([
            'product' => function($q){
                $q->select('id','name','image');
            },
        ]);
        if($where){
            $table_product_details->whereRaw($where);
        }
                
        if(!empty($order)){
            $order = explode('-', $order);
            $table_product_details->orderBy($order[0],$order[1]);
        }
        if (!empty($limit)) {
            $table_product_details->limit($limit);
        }
        if($fetch === 'array'){
            $list = $table_product_details->get();
            return json_decode(json_encode($list ), true );
        }
        elseif($fetch === 'paginate'){
            $list = $table_product_details->paginate(1);
            return json_decode(json_encode($list ), true );
        }else if($fetch === 'obj'){
            return $table_product_details->limit($limit)->get();                
        }else if($fetch === 'single'){
            return $table_product_details->get()->first();
        }else if($fetch === 'count'){
            return $table_product_details->get()->count();
        }else{
            return $table_product_details->limit($limit)->get();
        }
    }
}

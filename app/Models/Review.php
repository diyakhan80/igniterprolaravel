<?php

namespace Models;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Support\Facades\DB;

class Review extends Model
{
    protected $table = 'reviews';
    protected $primaryKey = 'id';
    
    /*const CREATED_AT = 'created';
    const UPDATED_AT = 'updated';*/

    protected $fillable = ['name','email','phone','comments','rating','status','created_at','updated_at'];
    /**
     * [This method is for scope for default keys] 
     * @return Boolean
     */
 

    public static function add($data){
        if(!empty($data)){
            return self::insertGetId($data);
        }else{
            return false;
        }   
    }       

     public static function list($fetch='array',$where='',$order='id-desc'){
                
        $table_review = self::select(['*'])
        ->where('status','active');
        if($where){
            $table_review->whereRaw($where);
        }
        
        if(!empty($order)){
            $order = explode('-', $order);
            $table_review->orderBy($order[0],$order[1]);
        }
        if($fetch === 'array'){
            $list = $table_review->get();
            return json_decode(json_encode($list ), true );
        }else if($fetch === 'obj'){
            return $table_review->limit($limit)->get();                
        }else if($fetch === 'single'){
            return $table_review->get()->first();
        }else if($fetch === 'count'){
            return $table_review->get()->count();
        }else{
            return $table_review->limit($limit)->get();
        }
    }

    public static function change($userID,$data){
        $isUpdated = false;
        $table_reviews = \DB::table('reviews');
        if(!empty($data)){
            $table_reviews->where('id','=',$userID);
            $isUpdated = $table_reviews->update($data); 
        }      
        return (bool)$isUpdated;
    }
}

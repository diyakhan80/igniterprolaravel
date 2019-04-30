<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'email',
        'phone_code',
        'mobile_number',
        'status',
        'created_at',
        'updated_at',
    ];

    public static function add($data){
        if(!empty($data)){
            return self::insertGetId($data);
        }else{
            return false;
        }   
    }

    public static function list($fetch='array',$where='',$keys=['*'],$order='id-desc')
    {
    	$table_course = self::select($keys);
        if($where){
            $table_course->whereRaw($where);
        }

        if(!empty($order)){
            $order = explode('-', $order);
            $table_course->orderBy($order[0],$order[1]);
        }
        if($fetch === 'array'){
            $list = $table_course->get();
            return json_decode(json_encode($list ), true );
        }else if($fetch === 'obj'){
            return $table_course->limit($limit)->get();                
        }else if($fetch === 'single'){
            return $table_course->get()->first();
        }else if($fetch === 'count'){
            return $table_course->get()->count();
        }else{
            return $table_course->limit($limit)->get();
        }
    }

    public static function change($userID,$data){
        $isUpdated = false;
        $table_course = \DB::table('clients');
        if(!empty($data)){
            $table_course->where('id','=',$userID);
            $isUpdated = $table_course->update($data); 
        }
        return (bool)$isUpdated;
    }
}

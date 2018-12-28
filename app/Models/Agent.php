<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    protected $table = 'agent';
    protected $primaryKey = 'id';
    
    /*const CREATED_AT = 'created';
    const UPDATED_AT = 'updated';*/

    protected $fillable = [
        'name',
        'phone_code',
        'mobile_number',
        'email',
        'status',
        'created_at',
        'updated_at',
        
    ];
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

     public static function list($fetch='array',$where='',$keys=['*'],$order='id-desc'){
                
        $table_course = self::select($keys)
        ->where('status','active');
        if($where){
            $table_course->whereRaw($where);
        }
        
        //$userlist['userCount'] = !empty($table_user->count())?$table_user->count():0;
        
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
        $table_agent = \DB::table('agent');
        if(!empty($data)){
            $table_agent->where('id','=',$userID);
            $isUpdated = $table_agent->update($data); 
        }
                
        return (bool)$isUpdated;
    }

     public static function addCourseEnquiry($data){
        $isAdded = false;
        $table_course = \DB::table('course_enquiry');
        if(!empty($data)){
            $isAdded = $table_course->insertGetId($data); 
        }
                
        return (bool)$isAdded;
    }

  
}
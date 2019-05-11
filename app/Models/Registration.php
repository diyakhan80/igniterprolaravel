<?php

namespace Models;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Support\Facades\DB;

class Registration extends Model
{
    protected $table = 'registration';
    protected $primaryKey = 'id';
    
    /*const CREATED_AT = 'created';
    const UPDATED_AT = 'updated';*/

    protected $fillable = [
        'name',
        'email',
        'phone',
        'course_id',
        'location',
        'status',
        'created_at',
        'updated_at'
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

  
}

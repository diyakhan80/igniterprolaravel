<?php

namespace Models;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Support\Facades\DB;

class Enquiry extends Model
{
    protected $table = 'enquiry';
    protected $primaryKey = 'id';
    
    /*const CREATED_AT = 'created';
    const UPDATED_AT = 'updated';*/

    protected $fillable = [
        'name',
        'email',
        'phone',
        'course',
        'location',
        'comments',
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

<?php

namespace Models;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Support\Facades\DB;

class Career extends Model
{
    protected $table = 'career';
    protected $primaryKey = 'id';
    
    /*const CREATED_AT = 'created';
    const UPDATED_AT = 'updated';*/

    protected $fillable = [
        'name',
        'email',
        'jobtitle',
        'resume',
        'rating',
        'applied_on',
        
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

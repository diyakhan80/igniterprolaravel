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
        'course_id',
        'location',
        'comments',
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

    public function courses(){
        return $this->hasOne('App\Models\Course','id','course_id');
    }    

    public static function list($fetch='array',$where='',$keys=['*'],$order='id-desc'){
        $table_courses = self::select($keys)
        ->with([
            'courses' => function($q){
                $q->select('id','course_name');
            },
        ]);
        if($where){
            $table_courses->whereRaw($where);
        }
                
        if(!empty($order)){
            $order = explode('-', $order);
            $table_courses->orderBy($order[0],$order[1]);
        }
        if (!empty($limit)) {
            $table_courses->limit($limit);
        }
        if($fetch === 'array'){
            $list = $table_courses->get();
            return json_decode(json_encode($list ), true );
        }
        elseif($fetch === 'paginate'){
            $list = $table_courses->paginate(1);
            return json_decode(json_encode($list ), true );
        }else if($fetch === 'obj'){
            return $table_courses->limit($limit)->get();                
        }else if($fetch === 'single'){
            return $table_courses->get()->first();
        }else if($fetch === 'count'){
            return $table_courses->get()->count();
        }else{
            return $table_courses->limit($limit)->get();
        }
    }
}

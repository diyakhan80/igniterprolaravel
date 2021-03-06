<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'project';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'client_id',
        'project_name',
        'project_type',
        'project_price',
        'balance',
        'project_duration',
        'project_start_from',
        'project_agent_id',
        'agent_commission',
        'status',
        'created_at',
        'updated_at',
    ];

    public function client(){
        return $this->hasOne('App\Models\Client','id','client_id');
    }

    public function agent()
    {
        return $this->hasOne('App\Models\Agent','id','project_agent_id');  
    }

    public function payment()
    {
        return $this->hasOne('App\Models\Projectpayment','project_id','id');  
    }

    public static function add($data){
        if(!empty($data)){
            return self::insertGetId($data);
        }else{
            return false;
        }   
    }

    public static function list($fetch='array',$where='',$keys=['*'],$order='id-asc'){
                
        $table_project = self::select($keys)
        ->with([
            'client' => function($q){
                $q->select('id','name','email','phone_code','mobile_number');
            },
            'agent' => function($q){
                $q->select('id','name');
            },
            'payment' => function($q){
                $q->select('project_id','recieved_payment','payment_method','next_payment','next_delivery','balance');
            },
        ]);
       
        if($where){
            $table_project->whereRaw($where);
        }
        
        //$userlist['userCount'] = !empty($table_user->count())?$table_user->count():0;
        
        if(!empty($order)){
            $order = explode('-', $order);
            $table_project->orderBy($order[0],$order[1]);
        }
        if($fetch == 'array'){
            $list = $table_project->get();
            return json_decode(json_encode($list ), true );
        }else if($fetch ==='obj'){
            return $table_project->limit($limit)->get();                
        }else if($fetch == 'single'){
            return $table_project->get()->first();
        }else if($fetch == 'count'){
            return $table_project->get()->count();
        }else{
            return $table_project->limit($limit)->get();
        }
    }

    public static function change($userID,$data){
        $isUpdated = false;
        $table_project = \DB::table('project');
        if(!empty($data)){
            $table_project->where('id','=',$userID);
            $isUpdated = $table_project->update($data); 
        }
        return (bool)$isUpdated;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projectpayment extends Model
{
    protected $table = 'project_payment';
    protected $primaryKey = 'id';

    protected $fillable = [
        'project_id',
        'recieved_payment',
        'balance',
        'payment_method',
        'status',
        'next_payment',
        'next_delivery',
        'agent_commission',
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

    public static function change($userID,$data){
        $isUpdated = false;
        $table_project_payment = \DB::table('project_payment');
        if(!empty($data)){
            $table_project_payment->where('id','=',$userID);
            $isUpdated = $table_project_payment->update($data); 
        }
        return (bool)$isUpdated;
    }

    public function project(){
        return $this->hasOne('App\Models\Project','id','project_id');
    }

    public static function list($fetch='array',$where='',$keys=['*'],$order='id-asc'){
                
        $table_project = self::select($keys)
        ->with([
            'project' => function($q){
                $q->select('id','project_name','project_type','project_price','project_duration','project_start_from');
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
}

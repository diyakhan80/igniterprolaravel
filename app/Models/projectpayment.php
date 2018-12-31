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
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactAddress extends Model
{
    protected $table = 'contactaddress';
    protected $fillable = ['address','email','phone','whatsapp','status','created_at','updated_at'];
}

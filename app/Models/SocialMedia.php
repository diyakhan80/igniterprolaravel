<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    protected $table = 'socialmedia';
    protected $fillable = ['url','status','created_at','updated_at'];
}

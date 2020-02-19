<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    //


    public function user()
    {
    	$this->belongTo('user::class');
    }
}

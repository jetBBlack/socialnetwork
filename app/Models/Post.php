<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
	protected $table = 'posts';

	


    public function user()
    {
    	$this->belongsTo('user::class');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
	protected $table = 'profiles';



    protected $fillable = [
    	'city','country','about','user_id',
    ];

    public function user()
    {
    	return $this->belongsTo('App\Models\User');
    }

    
}

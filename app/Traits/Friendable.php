<?php

namespace App\Traits;
use App\Models\Friendship;

trait Friendable
{
	public function test()
	{
		return 'hi';
	}

	public function addFriend($id)
	{
		$Friendships = Friendship::create([
			'requester' => $this->id,
			'user_requested' => $id,
		]);

		if($Friendships)
		{
			echo $Friendships;
		}else{
			echo "fail";
		}
	}
	
}
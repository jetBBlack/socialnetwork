<?php

namespace App\Traits;
use App\friendships;

trait Friendable
{
	public function test()
	{
		return 'hi';
	}

	public function addFriend($id)
	{
		$Friendships = friendships::create([
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
<?php
namespace app\index\controller;

use app\index\model\Profile;
use app\index\model\User as UserModel;

class User
{   
	// 关联查询
	public function read()
	{
	    $user = UserModel::getByNickname('张三');
	    dump($user->roles);
	}
}
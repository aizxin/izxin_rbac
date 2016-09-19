<?php
namespace Aizxin\Repositories\Eloquent\Admin;

use Aizxin\Repositories\Eloquent\Repository;
use Aizxin\Models\User;
class UserRepository extends Repository
{
	/**
	 *  [model description]
	 *  izxin.com
	 *  @author qingfeng
	 *  @DateTime 2016-09-18T23:49:19+0800
	 *  @return   [type]                   [description]
	 */
	public function model()
	{
		return User::class;
	}
}
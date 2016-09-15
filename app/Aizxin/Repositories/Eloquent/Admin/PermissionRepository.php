<?php
namespace Aizxin\Repositories\Eloquent\Admin;

use Aizxin\Repositories\Eloquent\Repository;
use Aizxin\Models\Permission;
use Cache;
class PermissionRepository extends Repository
{
	public function model()
	{
		return Permission::class;
	}
}
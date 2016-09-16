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
	/**
	 *  [getPermissionParent 顶级权限]
	 *  izxin.com
	 *  @author qingfeng
	 *  @DateTime 2016-09-16T13:23:17+0800
	 *  @param    integer                  $parent [description]
	 *  @return   [type]                           [description]
	 */
	public function getPermissionParent($parent = 0){
		$data = $this->findByField('parent_id',0)->makeVisible('attribute')->toArray();
		if (empty($data)) {
            return [];
        }
		foreach ($data as $key => $rule) {
            $data[$key]['child'] = $this->findByField('parent_id',$rule['id'])->makeVisible('attribute')->toArray();
        }
        return $data;
	}
}
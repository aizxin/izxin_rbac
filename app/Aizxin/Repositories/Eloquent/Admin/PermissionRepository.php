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
	public $fillable = ['id', 'display_name','parent_id','sort','name'];
	/**
	 *  [getPermissionParent 顶级权限]
	 *  izxin.com
	 *  @author qingfeng
	 *  @DateTime 2016-09-16T13:23:17+0800
	 *  @param    integer                  $parent [description]
	 *  @return   [type]                           [description]
	 */
	public function getPermissionParent($parent = 0)
	{
		$data = $this->findByField('parent_id',0,'sort','asc',$this->fillable)->toArray();
		if (empty($data)) {
            return [];
        }
		foreach ($data as $key => $rule) {
            $data[$key]['child'] = $this->findByField('parent_id',$rule['id'],'sort','asc',$this->fillable)->toArray();
        }
        return $data;
	}
	/**
	 *  [getPermissionList 权限列表]
	 *  izxin.com
	 *  @author qingfeng
	 *  @DateTime 2016-09-17T12:57:45+0800
	 *  @return   [type]                   [description]
	 */
	public function getPermissionList($request)
	{
		$results =  $this->model
		   ->where('display_name','like','%'.$request['display_name'].'%')
		   ->where(function($query){
		        $query->where('parent_id',0);
		    })
		   ->orderBy("id",'asc')
		   ->paginate($request['pageSize'])
		   ->toArray();
		if(count($results['data'])){
			foreach ($results['data'] as $k => $rule) {
            	$results['data'][$k]['child'] = $this->findByField('parent_id',$rule['id'],'sort','asc',$this->fillable)->toArray();
            	if(count($results['data'][$k]['child'])){
			        foreach ($results['data'][$k]['child'] as $y => $r) {
			            $results['data'][$k]['child'][$y]['child'] = $this->findByField('parent_id',$r['id'],'sort','asc',$this->fillable)->toArray();
			        }
            	}
        	}
		}
		$response = [
	        'pagination' => [
	            'total' => $results['total'],
	            'per_page' => $results['per_page'],
	            'current_page' => $results['current_page'],
	            'last_page' => $results['last_page'],
	            'from' => $results['from'],
	            'to' => $results['to']
	        ],
	        'data' => $results['data']
	    ];
    	return $response;
	}
	/**
	 *  [getChild 获取子节点]
	 *  izxin.com
	 *  @author qingfeng
	 *  @DateTime 2016-09-17T14:23:53+0800
	 *  @param    [type]                   $data [description]
	 *  @return   [type]                         [description]
	 */
	public function getChild($data)
	{
		foreach ($data as $key => $rule) {
            $data[$key]['child'] = $this->findByField('parent_id',$rule['id'],'sort','asc',$this->fillable)->toArray();
        }
        return $data;
	}
	/**
	 *  [destroyPermission 删除权限]
	 *  izxin.com
	 *  @author qingfeng
	 *  @DateTime 2016-09-17T17:11:11+0800
	 *  @param    [type]                   $request [description]
	 *  @return   [type]                            [description]
	 */
	public function destroyPermission($id)
	{
		$childNum = $this->model->where('parent_id',$id)->count();
		if($childNum > 0){
			return false;
		}
		$isDelete = $this->model->destroy($id);
    	if ($isDelete) {
			return true;
    	}
    	return false;
	}
	/**
	 *  [editMenu 权限获取]
	 *  izxin.com
	 *  @author qingfeng
	 *  @DateTime 2016-09-17T23:29:16+0800
	 *  @param    [type]                   $id [description]
	 *  @return   [type]                       [description]
	 */
	public function findPermission($id)
	{
		return $this->model->find($id)->toArray();
	}
}
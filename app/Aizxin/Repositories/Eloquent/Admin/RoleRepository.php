<?php
namespace Aizxin\Repositories\Eloquent\Admin;

use Aizxin\Repositories\Eloquent\Repository;
use Aizxin\Models\Role;

class RoleRepository extends Repository
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
		return Role::class;
	}
	/**
	 *  [getRoleList 角色列表]
	 *  izxin.com
	 *  @author qingfeng
	 *  @DateTime 2016-09-19T12:08:51+0800
	 *  @param    [type]                   $request [description]
	 *  @return   [type]                            [description]
	 */
	public function getRoleList($request)
	{
		$results =  $this->model
		   ->where('display_name','like','%'.trim($request['display_name']).'%')
		   ->orderBy("id",'asc')
		   ->paginate($request['pageSize'])
		   ->toArray();
    	return aizxin_paginate($results);
	}
	/**
	 *  [getPermissionRole 角色的权限]
	 *  izxin.com
	 *  @author qingfeng
	 *  @DateTime 2016-09-19T18:14:39+0800
	 *  @param    [type]                   $id [description]
	 *  @return   [type]                       [description]
	 */
	public function getPermissionRole($id)
	{
		return $this->model->find($id)->perms()->get(['id']);
	}
	/**
	 *  [updatePermissionRole 角色的权限修改]
	 *  izxin.com
	 *  @author qingfeng
	 *  @DateTime 2016-09-19T19:53:42+0800
	 *  @param    [type]                   $data [description]
	 *  @return   [type]                         [description]
	 */
	public function editPermissionRole($data)
	{
		return $this->model->find($data['id'])->perms()->sync($data['rules']);
	}
	/**
	 *  [destroy 角色删除]
	 *  izxin.com
	 *  @author qingfeng
	 *  @DateTime 2016-09-19T21:38:58+0800
	 *  @param    [type]                   $id [description]
	 *  @return   [type]                       [description]
	 */
	public function destroy($id)
	{
		return $this->model->destroy($id);
	}
	/**
	 *  [roleList 权限]
	 *  izxin.com
	 *  @author qingfeng
	 *  @DateTime 2016-09-19T15:17:14+0800
	 *  @return   [type]                   [description]
	 */
	public function roleList()
	{
		return $this->all(['id','display_name'])->toJson();
	}
}
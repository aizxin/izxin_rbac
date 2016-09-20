<?php
namespace Aizxin\Repositories\Eloquent\Admin;

use Aizxin\Repositories\Eloquent\Repository;
use Aizxin\Models\User;
class UserRepository extends Repository
{
	/**
	 *  [model User]
	 *  izxin.com
	 *  @author qingfeng
	 *  @DateTime 2016-09-18T23:49:19+0800
	 *  @return   [type]                   [description]
	 */
	public function model()
	{
		return User::class;
	}
	/**
	 *  [getUserList 管理员列表]
	 *  izxin.com
	 *  @author qingfeng
	 *  @DateTime 2016-09-19T23:24:17+0800
	 *  @param    [type]                   $request [description]
	 *  @return   [type]                            [description]
	 */
	public function getUserList($request)
	{
		$results =  $this->model
		   ->where('name','like','%'.trim($request['name']).'%')
		   ->orderBy("id",'asc')
		   ->paginate($request['pageSize'])
		   ->toArray();
    	return aizxin_paginate($results);
	}
	/**
	 *  [destroy 管理员删除]
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
	 *  [editRoles 管理员的角色显示]
	 *  izxin.com
	 *  @author qingfeng
	 *  @DateTime 2016-09-20T00:12:21+0800
	 *  @param    [type]                   $id [description]
	 *  @return   [type]                       [description]
	 */
	public function getRoles($id)
	{
		return $this->model->find($id)->roles()->get(['id','name']);
	}
	/**
	 *  [updateRoles 管理员的角色更新]
	 *  izxin.com
	 *  @author qingfeng
	 *  @DateTime 2016-09-20T12:10:30+0800
	 *  @param    [type]                   $input [description]
	 *  @return   [type]                          [description]
	 */
	public function updateRoles($input)
	{
		return $this->model->find($input['user_id'])->roles()->sync($input['roles']);
	}
}
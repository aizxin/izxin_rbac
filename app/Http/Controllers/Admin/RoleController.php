<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Aizxin\Services\Admin\RoleService;
class RoleController extends Controller
{
    /**
     *  [$service description]
     *  @var [type]
     */
    protected $service;
    /**
     *  [__construct description]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-19T11:59:53+0800
     *  @param    RoleService              $service [description]
     */
    public function __construct(RoleService $service){
        $this->service = $service;
    }
    /**
     *  [index description]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-19T11:08:30+0800
     *  @return   [type]                   [description]
     */
    public function index(Request $request)
    {
        $rule = $this->service->permissionList();
        if($request->ajax()){
            return $this->service->getRoleList($request);
        }
        return view('admin.role.index',compact('rule'));
    }
    /**
     *  [show description]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-19T12:26:12+0800
     *  @return   [type]                   [description]
     */
    public function show($id)
    {
        return $this->service->getPermissionRole($id);
    }
    /**
     *  [create 角色添加视图]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-19T12:11:06+0800
     *  @return   [type]                   [description]
     */
    public function create()
    {
        $role = json_encode(['id'=>0]);
        return view('admin.role.add',compact('role'));
    }
    /**
     *  [store 角色添加操作]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-19T12:20:24+0800
     *  @param    Request                  $request [description]
     *  @return   [type]                            [description]
     */
    public function store(Request $request)
    {
        return $this->service->create($request);
    }
    /**
     *  [edit 角色修改视图]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-19T13:46:43+0800
     *  @param    [type]                   $id [description]
     *  @return   [type]                       [description]
     */
    public function edit($id)
    {
        $role = $this->service->findById($id);
        return view('admin.role.add',compact('role'));
    }
    /**
     *  [destroy 角色删除]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-19T17:32:07+0800
     *  @param    [type]                   $id [description]
     *  @return   [type]                       [description]
     */
    public function destroy($id)
    {
        return $this->service->destroy($id);
    }
    /**
     *  [update 角色修改操作]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-19T17:32:41+0800
     *  @param    Request                  $request [description]
     *  @param    [type]                   $id      [description]
     *  @return   [type]                            [description]
     */
    public function update(Request $request,$id)
    {
        return $this->service->create($request);
    }
    /**
     *  [rule 权限分配]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-19T17:35:40+0800
     *  @param    Request                  $request [description]
     *  @return   [type]                            [description]
     */
    public function permission(Request $request)
    {
        return $this->service->editPermissionRole($request);
    }
}

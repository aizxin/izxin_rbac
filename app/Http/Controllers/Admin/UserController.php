<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Aizxin\Services\Admin\UserService;

class UserController extends Controller
{
    /**
     *  [$service 服务]
     *  @var [type]
     */
    protected $service;

    /**
     *  [__construct 注入]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-15T00:12:46+0800
     *  @param    AuthService              $service [description]
     */
    public function __construct(UserService $service){
        $this->service  = $service;
    }
    /**
     *  [index description]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-19T10:29:18+0800
     *  @return   [type]                   [description]
     */
    public function index(Request $request)
    {
        $role = $this->service->roleList();
        if($request->ajax()){
            return $this->service->getUserList($request);
        }
        return view('admin.user.index',compact('role'));
    }
    public function show($id){
        return $this->service->getRoles($id);
    }
    /**
     *  [create 管理员视图]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-19T22:52:37+0800
     *  @return   [type]                   [description]
     */
    public function create()
    {
        $user = json_encode(['id'=>0]);
        return view('admin.user.add',compact('user'));
    }
    /**
     *  [store 管理员视图操作]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-19T22:53:02+0800
     *  @param    Request                  $request [description]
     *  @return   [type]                            [description]
     */
    public function store(Request $request)
    {
        return $this->service->create($request);
    }
    /**
     *  [edit 管理员更新视图]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-19T23:34:19+0800
     *  @param    [type]                   $id [description]
     *  @return   [type]                       [description]
     */
    public function edit($id)
    {
        $user = $this->service->findById($id);
        return view('admin.user.add',compact('user'));
    }
    /**
     *  [destroy 管理员删除]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-19T23:51:47+0800
     *  @param    [type]                   $id [description]
     *  @return   [type]                       [description]
     */
    public function destroy($id)
    {
        return $this->service->destroy($id);
    }
    /**
     *  [update 管理员更新操作]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-19T23:50:48+0800
     *  @param    Request                  $request [description]
     *  @param    [type]                   $id      [description]
     *  @return   [type]                            [description]
     */
    public function update(Request $request,$id)
    {
        return $this->service->create($request);
    }
    /**
     *  [role 角色更新]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-20T12:00:37+0800
     *  @param    Request                  $request [description]
     *  @return   [type]                            [description]
     */
    public function role(Request $request)
    {
        return $this->service->updateRoles($request);
    }
}

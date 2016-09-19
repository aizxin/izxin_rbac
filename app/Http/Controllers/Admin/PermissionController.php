<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Aizxin\Services\Admin\PermissionService;

class PermissionController extends Controller
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
    public function __construct(PermissionService $service){
        $this->service  = $service;
    }
    /**
     *  [权限节点  列表]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-10T11:02:33+0800
     *  @return   [type]                   [description]
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            return $this->service->getPermissionList($request);
        }
        return view('admin.permission.index');
    }
    /**
     *  [show description]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-16T20:54:39+0800
     *  @return   [type]                   [description]
     */
    public function show(){
        return;
    }
    /**
     *  [权限节点  添加]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-10T11:02:44+0800
     *  @return   [type]                   [description]
     */
    public function create()
    {
        $rule = ['parent_id'=>0];
        $list = $this->service->getPermissionParent();
        $rules = json_encode($rule);
        return view('admin.permission.add',compact('list','rules'))->with('rule',$rule);
    }
    /**
     *  [权限节点  保存]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-10T11:02:54+0800
     *  @param    Request                  $request [description]
     *  @return   [type]                            [description]
     */
    public function store(Request $request)
    {
        return $this->service->create($request);
    }
    /**
     *  [edit 修改权限]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-17T18:48:37+0800
     *  @param    [type]                   $id [description]
     *  @return   [type]                       [description]
     */
    public function edit($id)
    {
        $rule = $this->service->find($id);
        $list = $this->service->getPermissionParent();
        $rules = json_encode($rule);
        return view('admin.permission.add',compact('list','rules'))->with('rule',$rule);
    }
    /**
     *  [update 权限修改操作]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-18T00:21:20+0800
     *  @param    Request                  $request [description]
     *  @param    [type]                   $id      [description]
     *  @return   [type]                            [description]
     */
    public function update(Request $request,$id)
    {
        return $this->service->create($request);
    }
    /**
     *  [destroy 删除权限]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-17T17:04:59+0800
     *  @return   [type]                   [description]
     */
    public function destroy($id)
    {
        return $this->service->destroy($id);
    }
}

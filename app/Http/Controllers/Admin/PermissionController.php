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
    public function index()
    {
        return view('admin.permission.index');
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
        return view('admin.permission.add');
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
}

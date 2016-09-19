<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Aizxin\Services\Admin\AuthService;

class AuthController extends Controller
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
     *  @param    AuthService              $service [description]
     */
    public function __construct(AuthService $service){
        $this->service  = $service;
    }
    /**
     *  [管理员登陆]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-10T11:01:41+0800
     *  @param    Request                  $request [description]
     *  @return   [type]                            [description]
     */
    public function login(Request $request)
    {
        // 已经登录则直接跳转
        if (Auth::user()) {
            return redirect()->route('admin.index.index');
        }
        if ($request->isMethod('get')) {
            return view('admin.auth.login');
        }
    }
    /**
     *  [postLogin 登陆]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-10T12:02:24+0800
     *  @param    UserRequest              $request [description]
     *  @return   [type]                            [description]
     */
    public function postLogin(Request $request)
    {
        return $this->service->postLogin($request);
    }
    /**
     *  [logout description]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-10T11:02:05+0800
     *  @return   [type]                   [description]
     */
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}

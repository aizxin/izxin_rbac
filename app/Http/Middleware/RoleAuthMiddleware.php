<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Route;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;

class RoleAuthMiddleware
{
    protected $auth;

    /**
     *  [__construct description]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-16T16:10:46+0800
     *  @param    Guard                    $auth [description]
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permissions)
    {
        // dd($this->auth->user()->hasRole('admin'));
        $currRouteName = Route::currentRouteName(); // 当前路由别名
        $previousUrl = URL::previous(); // 用户访问的上一页
        if(!$this->auth->user()->can($currRouteName) ){ // 如果是游客或者没有权限跳转到首页
            if($request->ajax() && ($request->getMethod() != 'GET')) {
                return response()->json([
                    'status' => -1,
                    'code' => 400,
                    'message' => '您没有权限执行此操作'
                ]);
            } else {
                return response()->view('errors.403', compact('previousUrl'));
            }
        }
        return $next($request);
    }
}

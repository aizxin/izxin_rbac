<?php
namespace Aizxin\Services\Admin;

use Illuminate\Support\Facades\Auth;
use Aizxin\Validators\AuthValidator;

use Prettus\Validator\Exceptions\ValidatorException;
use Aizxin\Services\CommonService;

class AuthService extends CommonService
{
    /**
     *  [$validator description]
     *  @var [type]
     */
    protected $validator;
    /**
     *  [__construct description]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-18T23:52:05+0800
     *  @param    AuthValidator            $validator [description]
     */
    public function __construct(AuthValidator $validator)
    {
        $this->validator  = $validator;
    }
    /**
     *  [postLogin 登录]
     *  izxin.com
     *  @author chouchong
     *  @DateTime 2016-09-14T13:38:03+0800
     *  @param    [type]                   $request [description]
     *  @return   [type]                            [description]
     */
    public function postLogin($request)
    {
        try {
            $this->validator->with( $request->all() )->passesOrFail();
            if (Auth::guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
                // 认证通过...
                return $this->respondWithSuccess(Auth::user()->toArray(), '登录成功');
            }
            return $this->respondWithErrors('账号或密码错误',400);

        } catch (ValidatorException $e) {
            return $this->respondWithErrors( $e->getMessageBag() , 422);
        }
    }
}
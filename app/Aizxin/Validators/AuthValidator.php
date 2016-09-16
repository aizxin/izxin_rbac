<?php
namespace Aizxin\Validators;

use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\LaravelValidator;

class AuthValidator extends LaravelValidator {

   /**
    *  [$rules 用户登录规则]
    *  @var [type]
    */
    protected $rules = [
        'email' => ['required', 'email', 'exists:users'], //查询用户
        // 'email' => ['required', 'email', 'unique:users'], //创建用户
        // 'email' => ['required', 'mobile_phone'],
        'password' => ['required', 'between:6,16'],
    ];
    /**
     *  [$messages 用户登录错误信息]
     *  @var [type]
     */
    protected $messages = [
    	'email.exists' => '邮箱不存在',
        'email.unique' => '邮箱已存在',
        'email.email' => '邮箱格式不正确',
        'email.required' => '邮箱为必填项',
        'password.required' => '密码为必填项',
        'password.between' => '密码长度必须是6-12',
        'email.mobile_phone' => '手机号码错误',
	];
}
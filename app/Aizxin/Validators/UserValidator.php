<?php
namespace Aizxin\Validators;

use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\LaravelValidator;

class UserValidator extends LaravelValidator {

   /**
    *  [$rules 用户规则]
    *  @var [type]
    */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name' => ['required','unique:users'],
            // 'email' => ['required', 'email', 'exists:users'], //查询用户
            'email' => ['required', 'email', 'unique:users'], //创建用户
            // 'email' => ['required', 'mobile_phone'],
            'password' => ['required','between:6,12','confirmed'],
            'password_confirmation' => ['required','between:6,12']
        ],
        ValidatorInterface::RULE_UPDATE => [
            'name' => ['required'],
            'email' => ['required', 'email'], //创建用户
            'password' => ['required','between:6,12','confirmed'],
            'password_confirmation' => ['required','between:6,12']
        ],
    ];
    /**
     *  [$messages 用户错误信息]
     *  @var [type]
     */
    protected $messages = [
        'name.required' => '用户名为必填项',
        'name.unique' => '用户名已存在',
    	'email.exists' => '邮箱不存在',
        'email.unique' => '邮箱已存在',
        'email.email' => '邮箱格式不正确',
        'email.required' => '邮箱为必填项',
        'password.required' => '密码为必填项',
        'password.between' => '密码长度必须是6-12',
        'password.confirmed' => '两次密码不一致',
        'password_confirmation.required' => '确认密码为必填项',
        'password_confirmation.between' => '确认密码长度必须是6-12',
	];
}
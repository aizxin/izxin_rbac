<?php
namespace Aizxin\Validators;

use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\LaravelValidator;

class RoleValidator extends LaravelValidator {

   /**
    *  [$rules 角色规则]
    *  @var [type]
    */
    protected $rules = [
        'name' => ['required','unique:roles'],
        'display_name' => ['required','unique:roles'],
        'description' => ['required'],
    ];
    /**
     *  [$messages 角色错误信息]
     *  @var [type]
     */
    protected $messages = [
        'name.required' => '角色别名必填项',
        'name.unique' => '角色别名已经存在',
        'display_name.required' => '角色名必填项',
        'display_name.unique' => '角色名已经存在',
        'description.required' => '描述必填项',
	];
}
<?php
namespace Aizxin\Validators;

use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\LaravelValidator;

class PermissionValidator extends LaravelValidator {

   /**
    *  [$rules 权限规则]
    *  @var [type]
    */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'parent_id' => ['required'],
            'name' => ['required','unique:permissions'],
            'display_name' => ['required','unique:permissions'],
            'description' => ['required'],
            'is_menu' => ['integer'],
            'sort' => ['required','integer']
        ],
        ValidatorInterface::RULE_UPDATE => [
            'parent_id' => ['required'],
            'name' => ['required'],
            'display_name' => ['required'],
            'description' => ['required'],
            'is_menu' => ['integer'],
            'sort' => ['required','integer']
        ],
    ];
    /**
     *  [$messages 权限规则错误信息]
     *  @var [type]
     */
    protected $messages = [
    	'parent_id.required' => '顶级必填项',
        'name.required' => '权限别名必填项',
        'name.unique' => '权限别名已经存在',
        'display_name.required' => '权限名必填项',
        'display_name.unique' => '权限名已经存在',
        'description.required' => '描述必填项',
        'is_menu.integer' => '是否菜单必填项',
        'sort.integer' => '排序必须数字',
        'sort.required' => '排序必须项',
	];
}
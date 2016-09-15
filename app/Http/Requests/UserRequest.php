<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     *  [rules User 验证规则]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-10T11:34:57+0800
     *  @return   [type]                   [description]
     */
    public function rules()
    {
        return [
            'email' => ['required', 'email', 'exists:users'], //查询用户
            // 'email' => ['required', 'email', 'unique:users'], //创建用户
            'password' => ['required', 'between:6,16'],
        ];
    }
    /**
     *  [messages User 验证不通过的错误信息]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-10T11:33:27+0800
     *  @return   [type]                   [description]
     */
    public function messages(){
        return [
            'email.exists' => '邮箱不存在',
            'email.unique' => '邮箱已存在',
            'email.email' => '邮箱格式不正确',
            'email.required' => '邮箱为必填项',
            'password.required' => '密码为必填项',
            'password.between' => '密码长度必须是6-12',
        ];
    }
}

<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PermissionRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     *  [rules Permission 验证规则]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-10T11:32:24+0800
     *  @return   [type]                   [description]
     */
    public function rules()
    {
        return [
            //
        ];
    }
    /**
     *  [messages Permission 验证不通过的错误信息]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-10T11:33:27+0800
     *  @return   [type]                   [description]
     */
    public function messages(){
        return [
            
        ];
    }
}

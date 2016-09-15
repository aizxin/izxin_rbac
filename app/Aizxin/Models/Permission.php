<?php

namespace Aizxin\Models;

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
    protected $parent = 'parent_id';

    protected $fillable = ['name','display_name','description','is_menu','parent_id','sort','icon'];
    /**
     *  [role 与角色多对多关系]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-14T23:39:35+0800
     *  @return   [type]                   [description]
     */
    public function role()
    {
    	return $this->belongsToMany('Aizxin\Models\Role');
    }
}

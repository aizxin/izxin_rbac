<?php

namespace Aizxin\Models;

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
    protected $parent = 'parent_id';

    protected $fillable = ['name','display_name','description','is_menu','parent_id','sort','icon'];

    /** @var [type] [description] */
    // protected $visible = ['id', 'display_name','parent_id','sort'];
}

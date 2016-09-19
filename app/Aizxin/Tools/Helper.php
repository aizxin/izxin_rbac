<?php

if (! function_exists('foo')) {
    /**
     *  [foo 示例]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-19T11:32:07+0800
     *  @return   [type]                   [description]
     */
    function foo() {
        return "foo";
    }
}
if (! function_exists('sortMenu')) {
    /**
     *  [sortMenu description]
     */
    function sortMenu($menus,$pid=0)
    {
        $arr = [];
        if (empty($menus)) {
            return '';
        }
        foreach ($menus as $key => $v) {
            if ($v['parent_id'] == $pid) {
                $arr[$key] = $v;
                $arr[$key]['child'] = sortMenu($menus,$v['id']);
            }
        }
        return $arr;
    }
}
/**
 *  aizxin_paginate
 */
if (! function_exists('aizxin_paginate')) {
    /**
     *  [aizxin_paginate description]
     */
    function aizxin_paginate($results)
    {
        $response = [
            'pagination' => [
                'total' => $results['total'],
                'per_page' => $results['per_page'],
                'current_page' => $results['current_page'],
                'last_page' => $results['last_page'],
                'from' => $results['from'],
                'to' => $results['to']
            ],
            'data' => $results['data']
        ];
        return $response;
    }
}

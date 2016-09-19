<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     *  [index description]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-19T10:29:18+0800
     *  @return   [type]                   [description]
     */
    public function index()
    {
        return view('admin.user.index');
    }
    public function show(){
    }
    public function create()
    {
        return view('admin.user.add');
    }
    public function store(Request $request)
    {
    }
    public function edit($id)
    {
    }
    public function destroy($id)
    {
    }
    public function update(Request $request,$id)
    {
    }
}

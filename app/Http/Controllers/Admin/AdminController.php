<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
    *  后台主界面    *
    */
    public function index()
    {
        return view('admin.index');
    }
}

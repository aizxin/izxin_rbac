<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
}

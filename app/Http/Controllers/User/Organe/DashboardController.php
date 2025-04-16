<?php

namespace App\Http\Controllers\User\Organe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index(Request $request){
        return view("organe.dashboard");
    }

    function indexBlog(Request $request){
        return view("organe.blog.show");
    }
}

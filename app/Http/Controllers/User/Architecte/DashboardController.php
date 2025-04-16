<?php

namespace App\Http\Controllers\User\Architecte;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index(Request $request){
        return view("architecte.dashboard");
    }
}

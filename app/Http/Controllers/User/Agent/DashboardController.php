<?php

namespace App\Http\Controllers\User\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index(Request $request){
        return view("agent.dashboard");
    }
}

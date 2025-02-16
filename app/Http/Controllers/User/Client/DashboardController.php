<?php

namespace App\Http\Controllers\User\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index(Request $request){
        return view("client.dashboard");
    }
}

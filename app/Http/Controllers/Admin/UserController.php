<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function clients()
    {
        $id = session('id');
        $users = User::where(['status' => 1, 'type_user' => 1])->get();
        return view('admin.dashboard.users.clients', compact('users'));
    }

    public function agents()
    {
        $id = session('id');
        $users = User::where(['status' => 1, 'type_user' => 2])->get();
        return view('admin.dashboard.users.agents', compact('users'));
    }
}

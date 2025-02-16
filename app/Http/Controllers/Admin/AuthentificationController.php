<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Journal;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Session;

class AuthentificationController extends Controller
{
    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->input();
            if (Admin::where(['email' => $data['email'],'status' => 1])->first()) {
                $currentAdmin = Admin::where(['email' => $data['email'],'status' => 1])->first();
                if (Hash::check($data['password'], $currentAdmin->password)) {
                    session(['id' => $currentAdmin->id,
                        'level' => $currentAdmin->level,
                        'is_admin' => 1,
                        'email' => $currentAdmin->email]);
                    return redirect('/admin/dashboard');

                } else {
                    return redirect()->back()->with('flash_message_error', 'Votre mot de passe invalide');
                }
            } else {
                return redirect()->back()->with('flash_message_error', 'Email invalide! Veuillez réessayer');
            }
        }
        return view('admin.index');
    }
}

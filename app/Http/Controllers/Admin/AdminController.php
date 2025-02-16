<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin;

class AdminController extends Controller
{
    public function add(Request $request)
    {
        $id = session('id');
        if ($request->isMethod('post')) {
            $data = $request->all();
            $email = $data['email'];
            $last_name = $data['last_name'];
            $first_name = $data['first_name'];
            $password = $data['password'];
            $c_password = $data['c_password'];

            if ($password == $c_password) {
                Admin::create([
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'email' => $email,
                    'password' => bcrypt($password),
                    'level' => 1
                ]);
                return redirect()->back()->with('flash_message_success', 'Nouvel Admininistrateur ajouté avec succès!');
            } else {
                return redirect()->back()->with('flash_message_error', 'Mots de passe non identiques!');
            }
        }
        return view('admin.dashboard.admins.add');
    }
    public function edit(Request $request, $language, $idAdmin)
    {
        $id = session('id');
        $admin = Admin::where(['id' => $idAdmin])->first();
        if ($request->isMethod('post')) {
            $data = $request->all();
            $email = $data['email'];
            $last_name = $data['last_name'];
            $first_name = $data['first_name'];

            Admin::where(['id' => $idAdmin])->update([
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email
            ]);

            return redirect()->back()->with('flash_message_success', 'Admininistrateur modifié avec succès!');
        }
        return view('admin.dashboard.admins.edit')->with(compact('admin'));
    }
    public function show()
    {
        $id = session('id');
        $admins = Admin::where(['status' => 1, 'level' => 1])->get();
        return view('admin.dashboard.admins.show', compact('admins'));
    }
    public function delete(Request $request, $language, $idAdmin)
    {
        $id = session('id');
        $admin = Admin::where(['id' => $idAdmin])->first();
        Admin::where(['id' => $idAdmin])->update([
            'status' => 0
        ]);
        return redirect()->back()->with('flash_message_success', 'Admininistrateur supprimé avec succès!');
    }
}

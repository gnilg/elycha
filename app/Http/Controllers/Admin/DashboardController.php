<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Message;
use App\Models\Admin;
use App\Models\User;
use App\Models\Publication;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session as FacadesSession;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $id = session('id');
        $nbrePublicationsImmo = Publication::where(['status' => 1, 'is_immo' => 1])->get()->count();
        $nbrePublicationsAuto = Publication::where(['status' => 1, 'is_immo' => 2])->get()->count();
        $nbreClients = User::where(['status' => 1, 'type_user' => 1])->get()->count();
        $nbreAgents = User::where(['status' => 1, 'type_user' => 2])->get()->count();

        return view('admin.dashboard.index', compact('nbrePublicationsImmo', 'nbrePublicationsAuto', 'nbreClients', 'nbreAgents'));
    }


    public function logout(Request $request)
    {
        $id = session('id');
        FacadesSession::flush();
        return redirect('/admin');
    }


    public function changePassword(Request $request)
    {
        $id = session('id');
        if ($request->isMethod('post')) {
            $data = $request->all();
            $current_pwd = $data['c_password'];
            $admin = Admin::where(['id' => $id])->first();
            if (Hash::check($current_pwd, $admin->password)) {
                if ($data['n_password'] == $data['cn_password']) {
                    Admin::where(['id' => $id])->update([
                        'password' => bcrypt($data['n_password'])
                    ]);
                    return redirect()->back()->with('flash_message_success', 'Mot de passe mis à jour avec succès!');
                } else {
                    return redirect()->back()->with('flash_message_error', 'Mots de passe non identiques!');
                }
            } else {
                return redirect()->back()->with('flash_message_error', 'Mot de passe actuel invalide!');
            }
        }
        return view('admin.dashboard.profile.change_password');
    }

    public function profile(Request $request)
    {
        $id = session('id');
        $admin = Admin::where(['id' => $id])->first();
        if ($request->isMethod('post')) {
            $data = $request->all();
            Admin::where(['id' => $id])->update([
                'email' => $data['email'],
                'last_name' => $data['last_name'],
                'first_name' => $data['first_name']
            ]);
            return redirect()->back()->with('flash_message_success', 'Informations mises à jour avec succès!');
        }
        return view('admin.dashboard.profile.profile', compact('admin'));
    }

    public function chat(Request $request)
    {
        $messages = Message::whereRaw('id IN (select MAX(id) FROM messages GROUP BY user_id)')
            ->orderBy('created_at', 'DESC')
            ->get();
        return view('admin.dashboard.chat', compact('messages'));
    }
}

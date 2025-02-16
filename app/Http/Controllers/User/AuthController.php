<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->input();
            if (User::where(['telephone' => $data['telephone']])->first()) {
                $currentUser = User::where(['telephone' => $data['telephone']])->first();
                if (Hash::check($data['password'], $currentUser->password)) {
                    if ($currentUser->type_user == 1) {
                        session([
                            'id' => $currentUser->id,
                            'is_client' => 1,
                            'telephone' => $currentUser->telephone
                        ]);
                        return redirect('/client/dashboard');
                    } else {
                        session([
                            'id' => $currentUser->id,
                            'is_agent' => 1,
                            'telephone' => $currentUser->telephone
                        ]);
                        return redirect('/agent/dashboard');
                    }
                } else {
                    return redirect()->back()->with('flash_message_error', 'Votre mot de passe invalide');
                }
            } else {
                return redirect()->back()->with('flash_message_error', 'Numéro de téléphone invalide! Veuillez réessayer');
            }
        }
    }

    public function register(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->input();
            if (!User::where(['telephone' => $data['telephone']])->first()) {
                $firstName = $data['first_name'];
                $lastName = $data['last_name'];
                $telephone = $data['telephone'];
                $password = $data['password'];
                $typeUser = $data['type_user'];
                User::create([
                    'first_name' => $firstName,
                    'last_name' => $lastName,
                    'telephone' => $telephone,
                    'password' => $password,
                    'token' => getRamdomText(20),
                    'avatar' => "/avatars/default.png",
                    'type_user' => $typeUser,
                    'status' => 1
                ]);
                $currentUser = User::where(['telephone' => $data['telephone']])->first();
                if ($typeUser == 1) {
                    session([
                        'id' => $currentUser->id,
                        'is_client' => 1,
                        'telephone' => $currentUser->telephone
                    ]);
                    return redirect('/client/dashboard');
                } else {
                    session([
                        'id' => $currentUser->id,
                        'is_agent' => 1,
                        'telephone' => $currentUser->telephone
                    ]);
                    return redirect('/agent/dashboard');
                }
            } else {
                return redirect()->back()->with('flash_message_error', 'Ce numéro de téléphone est déjà utilisé.');
            }
        }
    }
    public function logout(Request $request)
    {
        $id = session('id');
        // if ($id != null) {
        //     Journal::create([
        //         'action' => "Déconnexion de la plateforme",
        //         'admin_id' => $id,
        //     ]);
        // }
        Session::flush();
        return redirect('/');
    }
}

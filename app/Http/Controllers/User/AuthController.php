<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            // Validation des entrées
            $request->validate([
                'telephone' => 'required|exists:users,telephone',
                'password' => 'required|string|min:6',
            ]);

            $credentials = $request->only('telephone', 'password');

            // Vérifier l'utilisateur
            $currentUser = User::where('telephone', $credentials['telephone'])->first();

            if (!$currentUser || !Hash::check($credentials['password'], $currentUser->password)) {
                return redirect()->back()->with('flash_message_error', 'Numéro de téléphone ou mot de passe invalide!');
            }

            // Authentifier l'utilisateur
            Auth::login($currentUser);

            // Redirection basée sur type_user
            return match ($currentUser->type_user) {
                1 => redirect('/client/dashboard'),
                2 => redirect('/agent/dashboard'),
                3 => redirect('/architecte/dashboard'),
                4 => redirect('/societe/dashboard'),
                5 => redirect('/organe/dashboard')

            };
        }
    }

    public function register(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();

            // Vérifier si le numéro de téléphone est déjà utilisé
            if (User::where('telephone', $data['telephone'])->exists()) {
                return redirect()->back()->with('flash_message_error', 'Ce numéro de téléphone est déjà utilisé.');
            }

            // Validation des données
            $validated = $request->validate([
                'first_name' => 'required|string',
                'last_name' => 'required|string',
                'telephone' => 'required|string|unique:users,telephone',
                'password' => 'required|string|min:8',
                'type_user' => 'required|integer'
            ]);

            // Création de l'utilisateur
            $user = User::create([
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'],
                'telephone' => $validated['telephone'],
                'password' => bcrypt($validated['password']), // Hash du mot de passe
                'type_user' => $validated['type_user'],
                'token' => getRamdomText(20),
                'avatar' => '/avatars/default.png',
                'status' => 1,
            ]);

            // Authentifier l'utilisateur après l'inscription
            Auth::login($user);

            // Redirection après l'authentification
            return match (Auth::user()->type_user) {
                1 => redirect('/client/dashboard'),
                2 => redirect('/agent/dashboard'),
                3 => redirect('/architecte/dashboard'),
                4 => redirect('/societe/dashboard'),
                5 => redirect('/organe/dashboard'),
                default => redirect('/')


            };
        }

        return view('auth.register'); // Assurez-vous d'avoir une vue pour l'inscription
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

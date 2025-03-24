<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthentificationController extends Controller
{
    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $credentials = $request->only('email', 'password');

            if (Auth::guard('admin')->attempt($credentials)) { // 🔥 Assure-toi d'utiliser 'admin'
                $request->session()->regenerate(); // ✅ Empêche les boucles de redirection
                return redirect('admin/dashboard');
            }

            // Si l'authentification échoue
            return redirect()->back()->with('flash_message_error', 'Email ou mot de passe invalide');
        }

        return view('admin.index');
    }

    public function logout()
    {
        Auth::logout();
        Session::flush(); // Nettoyer les sessions
        return redirect()->route('login'); // Rediriger vers la page de connexion
    }
}

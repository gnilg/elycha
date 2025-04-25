<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function profile(Request $request){
        $user = auth()->user();
        if ($request->isMethod('post')) {
            $data = $request->all();
            $avatar = $user->avatar;
            if ($request->hasfile('avatar')) {
                $imageIcon = $request->file('avatar');
                $exten = $imageIcon->getClientOriginalExtension();
                $imageIconName = $request->nom . uniqid() . '.' . $exten;
                $destinationPath = myPublicPath('/avatars');
                $ulpoadImageSuccess = $imageIcon->move($destinationPath, $imageIconName);
                $avatar = "/avatars/" . $imageIconName;
            }
            User::where(['id' => $user->id])->update([
                'email' => $data['email'],
                'telephone' => $data['telephone'],
                'last_name' => $data['last_name'],
                'first_name' => $data['first_name'],
                'avatar' => $avatar
            ]);
            return redirect()->back()->with('flash_message_success', 'Informations mises à jour avec succès!');
        }
        return view("user.profile");
    }
    function updatePassword(Request $request){
        $id = session('id');
        if ($request->isMethod('post')) {
            $data = $request->all();
            $current_pwd = $data['c_password'];
            $user = User::where(['id' => $id])->first();
            if (Hash::check($current_pwd, $user->password)) {
                if ($data['n_password'] == $data['cn_password']) {
                    User::where(['id' => $id])->update([
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
        return view("user.update_password");
    }
}

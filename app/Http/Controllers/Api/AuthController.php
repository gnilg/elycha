<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\User as UserResource;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * @group  Api Authentification User
     *
     */
    public function login(Request $request)
    {
        $args = array();
        $args['error'] = false;
        $telephone = $request->telephone;
        try {
            $code = getRamdomInt(6);
            if (User::where(['telephone' => $telephone])->first()) {
                $user = User::where(['telephone' => $telephone])->first();
                $args['user'] = new UserResource($user);
                $args['message'] = "Informations recupérées avec succès!";
            } else {
                $args['code'] = $code;
                $args['error'] = true;
                $args['message'] = "Aucun compte associé";
            }
        } catch (\Exception $e) {
            $args['error'] = true;
            $args['message'] = $e->getMessage();
        }
        return response()->json($args);
    }

    /**
     * @group  Api Authentification User
     *
     */
    public function register(Request $request)
    {
        $args = array();
        $args['error'] = false;
        $telephone = $request->telephone;
        $last_name = $request->last_name;
        $first_name = $request->first_name;
        $avatar = $request->avatar;
        $password = $request->password;
        $typeUser = $request->type_user;

        try {
            if (!User::where(['telephone' => $telephone])->first()) {
                $primary = "/avatars/default.png";
                if ($avatar != "" && $avatar != null) {
                    $reference = getRamdomText(5);
                    $primary = "/avatars/"  . $reference . ".jpg";
                    $ImagePath = myPublicPath('/avatars') . "/"  . $reference . ".jpg";
                    file_put_contents($ImagePath, base64_decode($avatar));
                }
                $user = User::create([
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'telephone' => $telephone,
                    'avatar' => $primary,
                    'password' => bcrypt($password),
                    'token' => getRamdomText(20),
                    'status' => 1,
                    'type_user' => $typeUser
                ]);
                $user = User::where(['telephone' => $telephone])->first();
                $args['user'] = new UserResource($user);
                $args['message'] = "Compte créé avec succès!";
            } else {
                $args['error'] = true;
                $args['message'] = "Un compte existe déjà avec ces informations";
            }
        } catch (\Exception $e) {
            $args['error'] = true;
            $args['message'] = $e->getMessage();
        }
        return response()->json($args);
    }
    /**
     * @group  Api Authentification User
     *
     */
    public function sendCode(Request $request)
    {
        $args = array();
        $args['error'] = false;
        $idUser = $request->user_id;
        try {
            if (User::where(['id' => $idUser])->first()) {
                $user = User::where(['id' => $idUser])->first();
                $code = getRamdomInt(6);

                //sendSoluxAuth("KINGOO", $user->telephone, $code);

                $args['code'] = $code;
                $args['message'] = "Mot de passe correct";
            } else {
                $args['error'] = true;
                $args['message'] = "Aucun compte associé à ce numéro de téléphone!";
            }
        } catch (\Exception $e) {
            $args['error'] = true;
            $args['error_message'] = $e->getMessage();
            $args['message'] = "Erreur lors de l'envoi du code";
        }
        return response()->json($args, 200);
    }

    /**
     * @group  Api Authentification User
     *
     */
    public function sendCodeByPhone(Request $request)
    {
        $args = array();
        $args['error'] = false;
        $telephone = $request->telephone;
        $code = $request->code;
        try {
            if (User::where(['telephone' => $telephone])->first()) {
                $user = User::where(['telephone' => $telephone])->first();

                // sendSoluxAuth("KINGOO", $user->telephone, $code);

                $args['code'] = $code;
                $args['message'] = "Mot de passe correct";
            } else {
                $args['error'] = true;
                $args['message'] = "Aucun compte associé à ce numéro de téléphone!";
            }
        } catch (\Exception $e) {
            $args['error'] = true;
            $args['error_message'] = $e->getMessage();
            $args['message'] = "Erreur lors de l'envoi du code";
        }
        return response()->json($args, 200);
    }

    /**
     * @group  Api Authentification User
     *
     */
    public function checkPassword(Request $request)
    {
        $args = array();
        $args['error'] = false;
        $idUser = $request->user_id;
        $password = $request->password;
        try {
            if (User::where(['id' => $idUser])->first()) {
                $user = User::where(['id' => $idUser])->first();

                if (Hash::check($password, $user->password)) {
                    $args['user'] = new UserResource($user);
                    $args['message'] = "Mot de passe correct";
                } else {
                    $args['error'] = true;
                    $args['message'] = "Mot de passe erroné!";
                }
            } else {
                $args['error'] = true;
                $args['message'] = "Aucun compte associé à ce numéro de téléphone!";
            }
        } catch (\Exception $e) {
            $args['error'] = true;
            $args['error_message'] = $e->getMessage();
            $args['message'] = "Erreur lors de la vérification du mot de passe";
        }
        return response()->json($args, 200);
    }

    /**
     * @group  Api Authentification User
     *
     */
    public function updatePassword(Request $request)
    {
        $args = array();
        $args['error'] = false;
        $idUser = $request->user_id;
        $password = $request->password;
        try {
            if (User::where(['id' => $idUser])->first()) {
                $user = User::where(['id' => $idUser])->first();

                $user->update([
                    'password' => bcrypt($password)
                ]);
                $args['user'] = new UserResource($user);
                $args['message'] = "Mot de passe modifié avec succès!";
            } else {
                $args['error'] = true;
                $args['message'] = "Aucun compte associé à ce numéro de téléphone!";
            }
        } catch (\Exception $e) {
            $args['error'] = true;
            $args['error_message'] = $e->getMessage();
            $args['message'] = "Erreur lors de la modification du mot de passe";
        }
        return response()->json($args, 200);
    }

    /**
     * @group  Api Authentification User
     *
     */
    public function reinitializePassword(Request $request)
    {
        $args = array();
        $args['error'] = false;
        $telephone = $request->telephone;
        $password = $request->password;
        try {
            if (User::where(['telephone' => $telephone])->first()) {
                $user = User::where(['telephone' => $telephone])->first();

                $user->update([
                    'password' => bcrypt($password)
                ]);
                $args['user'] = new UserResource($user);
                $args['message'] = "Mot de passe modifié avec succès!";
            } else {
                $args['error'] = true;
                $args['message'] = "Aucun compte associé à ce numéro de téléphone!";
            }
        } catch (\Exception $e) {
            $args['error'] = true;
            $args['error_message'] = $e->getMessage();
            $args['message'] = "Erreur lors de la modification du mot de passe";
        }
        return response()->json($args, 200);
    }




    /**
     * @group  Api Authentification User
     *
     */
    public function updateInfos(Request $request)
    {
        $args = array();
        $args['error'] = false;
        $idUser = $request->user_id;
        $telephone = $request->telephone;
        $pays = $request->pays;
        $avatar = $request->avatar;
        $sexe = $request->sexe;

        try {
            if (User::where(['id' => $idUser])->first()) {
                $user = User::where(['id' => $idUser])->first();

                $avatarToSet = $user->avatar;
                if ($avatar != "" && $avatar != null) {
                    $reference = getRamdomText(5);
                    $avatarToSet = "/avatars/" . $user->last_name . $reference . ".png";
                    $path = myPublicPath('/avatars');
                    $ImagePath = $path . "/" . $user->last_name . $reference . ".png";
                    file_put_contents($ImagePath, base64_decode($avatar));
                }
                $user->update([
                    'telephone' => $telephone,
                    'country' => $pays,
                    //'sex' => $sexe,
                    'avatar' => $avatarToSet,
                ]);
                $args['user'] = new UserResource($user);
                $args['message'] = "Informations personnelles modifiées avec succès!";
            } else {
                $args['error'] = true;
                $args['message'] = "Aucun compte associé à ce numéro de téléphone!";
            }
        } catch (\Exception $e) {
            $args['error'] = true;
            $args['error_message'] = $e->getMessage();
            $args['message'] = "Erreur lors de la modification des informations";
        }
        return response()->json($args, 200);
    }

    /**
     * @group  Api Authentification User
     *
     */
    public function details(Request $request, $idUser)
    {
        $args = array();
        $args['error'] = false;
        try {
            if (User::where(['id' => $idUser])->first()) {
                $user = User::where(['id' => $idUser])->first();
                $args['version'] = 1;
                $args['version_ios'] = 1;
            } else {
                $args['error'] = true;
                $args['message'] = "Aucun compte associé à ce numéro de téléphone!";
            }
        } catch (\Exception $e) {
            $args['error'] = true;
            $args['error_message'] = $e->getMessage();
            $args['message'] = "Erreur lors de l'envoi du code";
        }
        return response()->json($args, 200);
    }
}

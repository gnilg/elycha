<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BoostPublication;
use App\Models\Parameter;
use App\Models\Sponsoring;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function callbackPayment(Request $request)
    {
        //$status = request('status');
        $identifier =  request('identifier');
        $txReference = request('tx_reference');

        $boostPublication = BoostPublication::where(['identifier' => $identifier])->first();
        $boostPublication->reference = $txReference;
        $boostPublication->save();

        $statusOperation = 0;
        $url = 'https://paygateglobal.com/api/v2/status';
        $params = array(
            'auth_token' => env('API_KEY'),
            'identifier' => $identifier
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);

        $result = curl_exec($ch);
        if (curl_errno($ch) !== 0) {
            error_log('cURL error when connecting to ' . $url . ': ' . curl_error($ch));
        }

        curl_close($ch);

        $result = json_decode(curl_exec($ch), true);

        if ($result['status'] == '0') {
            $statusOperation = 1;
        }

        if ($statusOperation == 1 && $boostPublication) {
            $boostPublication->state = 2;
            $boostPublication->save();

            $duration = 1;
            switch ($boostPublication->duration) {
                case '1 semaine':
                    $duration = 7;
                    break;
                case '2 semaines':
                    $duration = 14;
                    break;
                case '3 semaines':
                    $duration = 21;
                    break;
                case '1 mois':
                    $duration = 30;
                    break;
            }

            Sponsoring::create([
                'start_date' => date("Y-m-d H:i:s"),
                'end_date' => date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s") . "+ $duration days")),
                'publication_id' => $boostPublication->publication_id,
                'status' => 1
            ]);
            //sendNotifications($user->token, "TogoNavette", "Votre compte a été crédité d'un montant de " . $operation->montant . " Fcfa.");
        } else {
            //sendNotifications($user->token, "TogoNavette", "Le paiement de votre rechargement de " . $operation->montant . " Fcfa n'a pas été finalisé.");
        }
    }

    public function checkVersion(Request $request)
    {
        return response()->json(
            Parameter::where(['label' => "VERSION"])->first()
        );
    }
}

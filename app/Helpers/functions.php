<?php

use App\Models\Admin;
use App\Models\User;

if (!function_exists('getAdminAuth')) {
    function getAdminAuth()
    {
        $id = session('id');
        $admin = Admin::where(['id' => $id])->first();
        return $admin;
    }
}

if (!function_exists('checkIfIsLiked')) {
    function checkIfIsLiked($idUser, $idPublication)
    {
        return Admin::where(['publication_id' => $idPublication, 'user_id' => $idUser])->first() ? 1 : 0;
    }
}

if (!function_exists('isUserLogged')) {
    function isUserLogged()
    {
        $id = session('id');
        $isAgent = session('is_agent');
        $isClient = session('is_client');
        if ($id > 0 && ($isAgent > 0 || $isClient > 0)) {
            return true;
        }
        return false;
    }
}

if (!function_exists('getUserLogged')) {
    function getUserLogged()
    {
        $id = session('id');
        $user = User::where(['id' => $id])->first();
        return $user;
    }
}

if (!function_exists('getTimeOrDate')) {
    function getTimeOrDate($date)
    {
        $date1 = date_create($date);
        $date2 = date_create(Date("Y-m-d H:i:s"));
        $diff = date_diff($date1, $date2);
        $showing = "";
        $datetime = DateTime::createFromFormat('Y-m-d H:i:s', $date);
        if ($diff->days >= 6) {
            $showing = $datetime->format('d') . "/" . $datetime->format('m');
        } else if ($diff->days >= 1) {
            $showing = getDayOfWeekInFrench($datetime->format('w')) . " " . $datetime->format('H:i');
        } else {
            $showing = $datetime->format('H:i');
        }
        return $showing;
    }
}

if (!function_exists('getDayOfWeekInFrench')) {
    function getDayOfWeekInFrench($day)
    {
        $valueFrench = '';
        switch ($day) {
            case 0:
                $valueFrench = 'Dim';
                break;
            case 1:
                $valueFrench = 'Lun';
                break;
            case 2:
                $valueFrench = 'Mar';
                break;
            case 3:
                $valueFrench = 'Mer';
                break;
            case 4:
                $valueFrench = 'Jeu';
                break;
            case 5:
                $valueFrench = 'Ven';
                break;
            case 6:
                $valueFrench = 'Sam';
                break;
        }

        return $valueFrench;
    }
}


if (!function_exists('myPublicPath')) {
    function myPublicPath($path = "")
    {
        if (strlen($path) == 0) {
            if (env('APP_ENV') == "local") {
                return public_path();
            } else {
                return env('MY_PUBLIC_PATH');
            }
        } else {
            if (env('APP_ENV') == "local") {
                return public_path($path);
            } else {
                return env('MY_PUBLIC_PATH') . $path;
            }
        }
    }
}

// Random string
if (!function_exists('getRamdomText')) {
    function getRamdomText($n)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }
        return $randomString;
    }
}

// Random string capitalize
if (!function_exists('getRamdomTextCapi')) {
    function getRamdomTextCapi($n)
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }
        return $randomString;
    }
}
// int string
if (!function_exists('getRamdomInt')) {
    function getRamdomInt($n)
    {
        $characters = '0123456789';
        $randomString = '';

        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }
        return $randomString;
    }
}

if (!function_exists('getDate')) {
    function getDate($date)
    {
        $elements = explode(" ", $date);
        return $elements[0];
    }
}

if (!function_exists('getDateFromTimestamps')) {
    function getDateFromTimestamps($date)
    {
        $elements = explode(" ", $date);
        $elements2 = explode("-", $elements[0]);
        $date = $elements2[2] . "/" . $elements2[1] . "/" . $elements2[0];
        return $date;
    }
}

if (!function_exists('formatDate')) {
    function formatDate($date)
    {
        $formatDates = explode("T", $date);
        $elements = explode(" ", $formatDates[0]);
        $elements2 = explode("-", $elements[0]);
        $date = $elements2[2] . "-" . $elements2[1] . "-" . $elements2[0] . " " . $elements[1];
        return $date;
    }
}

if (!function_exists('superFormatDate')) {
    function superFormatDate($date)
    {
        $formatDates = explode("T", $date);
        $elements = explode(" ", $formatDates[0]);
        $elements2 = explode("-", $elements[0]);

        $timeFormat = explode(":", $elements[1]);
        $date = $elements2[2] . "-" . $elements2[1] . "-" . $elements2[0] . " à " . $timeFormat[0] . ":" . $timeFormat[1];
        return $date;
    }
}

if (!function_exists('formatDate2')) {
    function formatDate2($date)
    {
        $elements2 = explode("/", $date);
        $date = $elements2[2] . "/" . $elements2[1] . "/" . $elements2[0];
        return $date;
    }
}

if (!function_exists('reformatDate')) {
    function reformatDate($date)
    {
        $elements2 = explode("-", $date);
        $date = $elements2[2] . "-" . $elements2[1] . "-" . $elements2[0];
        return $date;
    }
}
if (!function_exists('formatDateSimple')) {
    function formatDateSimple($date)
    {
        $elements2 = explode("-", $date);
        $date = $elements2[2] . " " . getMonthName(intval($elements2[1])) . ", " . $elements2[0];
        return $date;
    }
}

if (!function_exists('getMonthName')) {
    function getMonthName($monthOfYear)
    {
        $arrayMonth = array(
            1 => "Janvier",
            2 => "Février",
            3 => "Mars",
            4 => "Avril",
            5 => "Mai",
            6 => "Juin",
            7 => "Juillet",
            8 => "Aôut",
            9 => "Septembre",
            10 => "Octobre",
            11 => "Novembre",
            12 => "Décembre"
        );
        $month =  $arrayMonth[$monthOfYear];
        return $month;
    }
}

if (!function_exists('payWithPaygate')) {
    function payWithPaygate($phone, $amount, $identifier, $method)
    {
        $apiToken = env('API_KEY');
        $description = 'Paiement boost pour une publication sur Alkebulan';

        $url = 'https://paygateglobal.com/api/v1/pay';
        $params = array(
            'auth_token' => $apiToken,
            'phone_number' => $phone,
            'amount' => $amount,
            'description' => $description,
            'identifier' => $identifier,
            'network' => $method
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

        return $result;
    }
}

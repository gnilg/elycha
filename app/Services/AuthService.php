<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Vonage\Client;
use Vonage\Client\Credentials\Basic;
use Vonage\SMS\Message\SMS;

class AuthService
{
    public function register(array $data)
    {
        info("i got it");
       
        $validator = Validator::make($data, [
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'nullable|email|unique:users,email',
            'telephone'  => 'required|string|unique:users,telephone',
            'password'   => 'required|string|min:6|confirmed',
            'avatar'     => 'nullable|file|image|max:2048',
            'type_user' => 'nullable|in:1,2',
        ]);
    
        if ($validator->fails()) {
            info("i got it 2");
            return response()->json([
                'message' => 'Validation error',
                'errors' => $validator->errors(),
            ], 422);
        }
    
        $avatarFileName = null;
        if (isset($data['avatar']) && $data['avatar']->isValid()) {
            info("i got it 3");
            $extension = $data['avatar']->getClientOriginalExtension();
            $avatarFileName = Str::random(20) . '.' . $extension;
            $data['avatar']->move(public_path('avatar'), $avatarFileName);
        }
    
        info("i got it 4");
        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name'  => $data['last_name'],
            'email'      => $data['email'] ?? null,
            'telephone'  => $data['telephone'],
            'password'   => Hash::make($data['password']),
            'avatar'     => $avatarFileName,
            'token'      => null,
            'type_user'  => $data['type_user'] ?? 1,
            'status'     => $data['status'] ?? 1,
            'balance'    => $data['balance'] ?? 0,
        ]);
    
        info("i got it 5");
        $token = $user->createToken('auth_token')->plainTextToken;
    
     
         // Return JSON response
    return response()->json([
        'user' => $user,
        'token' => $token,
    ], 200);  // 200 OK status
       
    }

    public function login(array $credentials)
    {

        info("Login 1");
        $validator = Validator::make($credentials, [
            'telephone' => 'required|string',
            'password'  => 'required|string',
        ]);

        if ($validator->fails()) {
            info("Login Validator failed");
            return response()->json([
                'message' => 'Validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $user = User::where('telephone', $credentials['telephone'])->first();

        if (! $user || ! Hash::check($credentials['password'], $user->password)) {
            info("Eror password");
            return response()->json([
                'message' => 'Validation error',
                'errors' => [
                    'telephone' => ['The provided credentials are incorrect.'],
                ],
            ], 422);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        info("Everything set login");
        return response()->json([
            'user'  => $user,
            'token' => $token,
        ], 200);
    }

    public function sendOtp(string $telephone)
    {
       // $otp = rand(100000, 999999);
        $otp = 999999;

        $user = User::firstOrCreate(
            ['telephone' => $telephone],
            ['first_name' => '', 'last_name' => '', 'password' => '', 'status' => 1]
        );

        $user->otp = $otp;
        $user->otp_expires_at = Carbon::now()->addMinutes(5);
        $user->save();

        $this->sendOtpSms($telephone, $otp);

        return ['message' => 'OTP sent successfully'];
    }

    private function sendOtpSms($telephone, $otp)
    {
        $basic  = new Basic(env('VONAGE_KEY'), env('VONAGE_SECRET'));
        $client = new Client($basic);

        $message = new SMS($telephone, env('VONAGE_SMS_FROM'), "Your OTP is: $otp");

        try {
            $client->sms()->send($message);
        } catch (\Exception $e) {
            logger()->error("Vonage OTP Send Failed: " . $e->getMessage());
            return response()->json([
                'message' => 'Validation error',
                'errors' => [
                    'telephone' => ['Failed to send OTP. Try again later.'],
                ],
            ], 422);
            
            
        }
    }

    public function verifyOtp(string $telephone, string $otp)
    {
        $user = User::where('telephone', $telephone)
                    ->where('otp', $otp)
                    ->where('otp_expires_at', '>', Carbon::now())
                    ->first();

        if (!$user) {
            throw ValidationException::withMessages([
                'otp' => ['Invalid or expired OTP.'],
            ]);
        }

        $user->otp = null;
        $user->otp_expires_at = null;

        if (empty($user->password)) {
            $user->status = 'active';
        }

        $user->save();

        $token = $user->createToken('auth_token')->plainTextToken;

        return [
            'user' => $user,
            'token' => $token,
        ];
    }

    public function requestPasswordReset(string $telephone)
    {
        $user = User::where('telephone', $telephone)->first();
    
        if (!$user) {
            return response()->json([
                'message' => 'Validation error',
                'errors' => [
                    'telephone' => ['User not found with this number.'],
                ],
            ], 422);
            
        
        }
    
        //$otp = rand(100000, 999999);
        $otp = 999999;
        $user->otp = $otp;
        $user->otp = 999999;
        $user->otp_expires_at = Carbon::now()->addMinutes(5);
        $user->save();

       // $this->sendOtpSms($telephone, $otp);
    
     
        return response()->json(['message' => 'OTP sent for password reset.']);
      
    }
    
     
public function resetPasswordWithOtp(string $telephone, string $otp, string $newPassword)
{
    info('resetPasswordWithOtp');
    $user = User::where('telephone', $telephone)
                ->where('otp', $otp)
                ->where('otp_expires_at', '>', Carbon::now())
                ->first();

    if (!$user) {
        info('resetPasswordWithOtp 2');
        return response()->json([
            'message' => 'Validation error',
            'errors' => [
                'otp' => ['Invalid or expired OTP.'],
            ],
        ], 422);
        
    }

    $user->password = Hash::make($newPassword);
    $user->otp = null;
    $user->otp_expires_at = null;
    $user->save();

    $token = $user->createToken('auth_token')->plainTextToken;

    info('resetPasswordWithOtp 3');
    return response()->json([
        'message' => 'Password reset successful.',
        'user' => $user,
        'token' => $token,
    ], 200);
}



}

<?php

namespace App\Http\Controllers\Api\Version;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Services\AuthService;
use App\Services\FirebaseService;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    protected $authService;
   
 
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function register(Request $request)
    {
        $result = $this->authService->register($request->all());
        
        return response()->json($result, 201);
    }

    public function login(Request $request)
    {
        $result = $this->authService->login($request->all());
        return response()->json($result, 200);
    }

    public function sendOtp(Request $request)
    {
        $request->validate([
            'telephone' => 'required|string',
        ]);
    
        return response()->json(
            $this->authService->sendOtp($request->telephone)
        );
    }
    
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'telephone' => 'required|string',
            'otp'       => 'required|string',
        ]);
    
        return response()->json(
            $this->authService->verifyOtp($request->telephone, $request->otp)
        );
    }

 

public function requestPasswordReset(Request $request)
{
    $request->validate([
        'telephone' => 'required|string',
    ]);

    return response()->json(
        $this->authService->requestPasswordReset($request->telephone)
    );
}

public function resetPassword(Request $request)
{
    info('rest pass');
    $request->validate([
        'telephone' => 'required|string',
        'otp'       => 'required|string',
        'password'  => 'required|string|min:6',
    ]);

    return response()->json(
        $this->authService->resetPasswordWithOtp(
            $request->telephone,
            $request->otp,
            $request->password
        )
    );
}

public function updateUserInfo(Request $request)
{
    info('update info');
    // Validate incoming data
    $validator = Validator::make($request->all(), [
        'first_name' => 'required|string|max:255',
        'type_user' => 'required|string|in:1,2',
        'password' => 'nullable|string|min:6', // Password confirmation field should be included in the request
        'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Profile image validation
    ]);

    if ($validator->fails()) {
        return response()->json([
            'errors' => $validator->errors()
        ], 422); // Unprocessable Entity
    }

    // Get the currently authenticated user
    $user = $request->user();

    // Update user's basic information
    $user->first_name = $request->input('first_name');
    $user->type_user = $request->input('type_user');

    // If password is provided and confirmed, update it
    if ($request->filled('password')) {
        $user->password = Hash::make($request->input('password'));
    }

    // If a new profile image is uploaded, save it
    if ($request->hasFile('avatar')) {
        $image = $request->file('avatar');
        $imagePath = $image->store('avatar', 'public'); // Store image in 'public/profile_images' directory

        // If the user already has a profile image, delete the old one
        if ($user->avatar) {
            // Delete old profile image
            \Storage::disk('public')->delete($user->avatar);
        }

        // Save the new profile image path to the database
        $user->avatar = $imagePath;
    }

    // Save the updated user information
    $user->save();

    // Return the updated user data as a response
    return response()->json([
        'message' => 'Profile updated successfully',
        'user' => $user
    ], 200); // OK response
}
}




    


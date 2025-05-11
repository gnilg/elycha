<?php
namespace App\Services;

use App\Models\User;
use App\Notifications\NewUserNotification;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;

class FirebaseService
{
    protected $messaging;

    public function __construct()
    {
        $factory = (new Factory)->withServiceAccount(storage_path('app/firebase/firebase_credentials.json'));
        $this->messaging = $factory->createMessaging();
    }

    public function sendToUser(User $user, string $title, string $body)
    {
        if (! $user->device_token) {
            return ['error' => 'No device token'];
        }

        //$user->notify(new NewUserNotification($title, $body));
        return $this->sendToToken($user->device_token, $title, $body);
    }

    public function sendToToken(string $token, string $title, string $body)
    {
        $message = CloudMessage::withTarget('token', $token)
            ->withNotification(Notification::create($title, $body));

        $this->messaging->send($message);



        return ['success' => true, 'token' => $token];
    }
}

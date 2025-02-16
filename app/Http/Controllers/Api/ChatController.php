<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Http\Resources\Message as MessageResource;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function messages(Request $request, $idUser)
    {
        return response()->json(
            MessageResource::collection(
                Message::where('user_id', '=', $idUser)->orderBy("created_at", 'ASC')->get()
            )
        );
    }

    public function sendMessage(Request $request, $idUser)
    {
        $args = array();
        $args['error'] = false;
        $content = $request->content;
        try {
            Message::create([
                'user_id' => $idUser,
                'content' => $content,
                'sender_type' => 1
            ]);
            return $this->messages($request, $idUser);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function sendMessageAdmin(Request $request, $idUser)
    {
        $args = array();
        $args['error'] = false;
        $content = $request->content;
        try {
            Message::create([
                'user_id' => $idUser,
                'content' => $content,
                'sender_type' => 2
            ]);
            return $this->messages($request, $idUser);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}

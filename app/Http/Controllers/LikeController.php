<?php

namespace App\Http\Controllers;

use App\Http\Resources\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    //
    public function like(Request $request)
    {
        $request->validate([
            'likeable_id' => 'required|integer',
            'likeable_type' => 'required|string',
        ]);

        $user = Auth::user();

        $like = Like::where('user_id', $user->id)
            ->where('likeable_id', $request->likeable_id)
            ->where('likeable_type', $request->likeable_type)
            ->first();

        if ($like) {
            // Si déjà liké, on supprime
            $like->delete();
            return response()->json(['message' => 'Like retiré']);
        } else {
            // Sinon, on ajoute un like
            Like::create([
                'user_id' => $user->id,
                'likeable_id' => $request->likeable_id,
                'likeable_type' => $request->likeable_type,
            ]);
            return response()->json(['message' => 'Like ajouté']);
        }
    }
}

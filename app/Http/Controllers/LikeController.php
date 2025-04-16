<?php

namespace App\Http\Controllers;

use App\Http\Resources\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{

    public function toggle(Request $request)

    {


        $request->validate([
            'post_id' => 'required|integer',
        ]);

        $user = auth()->user();
        $post = \App\Models\Post::findOrFail($request->post_id);

        $like = $post->likes()->where('user_id', $user->id)->first();

        if ($like) {
            $like->delete();
            $liked = false;
        } else {
            $post->likes()->create(['user_id' => $user->id]);
            $liked = true;
        }

        return response()->json([
            'liked' => $liked,
            'count' => $post->likes()->count(),
        ]);
    }

    //

    
}

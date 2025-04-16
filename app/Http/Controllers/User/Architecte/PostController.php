<?php

namespace App\Http\Controllers\User\Architecte;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Publication;
use Illuminate\Http\Request;

class PostController extends Controller
{
    function index(Request $request)
    {
        $userId = auth()->user()->id;
        $posts = Publication::where("status", ">=", 1)->where(["user_id" => $userId])->get();
        $countPost = Publication::where("status", ">=", 1)->where(["user_id" => $userId])->where(["is_immo" => 3])->get()->count();

        return view("architecte.posts.show", compact("posts", "countPost",));
    }

    public function add(Request $request)
{
    $userId = auth()->user()->id;
    $categories = Category::where(["status" => 1])->get();

    if ($request->isMethod('post')) {
        // ✅ Validation des données
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'video' => 'required|file|mimes:mp4,avi,mov,mkv|max:102400', // 100 Mo max
        ]);

        $videoPath = null;

        // ✅ Vérification et stockage de la vidéo
        if ($request->hasFile('video')) {
            $videoFile = $request->file('video');
            $videoName = $validated['title'] . '_' . uniqid() . '.' . $videoFile->getClientOriginalExtension();

            // Stocker dans storage/app/public/videos
            $videoFile->storeAs('public/videos', $videoName);

            // Chemin accessible via /storage/videos/
            $videoPath = "/storage/videos/" . $videoName;
        }

        // ✅ Création de l'enregistrement SEULEMENT après validation réussie
        Publication::create([
            'label' => $validated['title'],
            'description' => $validated['description'],
            'user_id' => $userId,
            'video' => $videoPath,
            'status' => 1,
            'is_immo' => 3,
        ]);

        return redirect("/architecte/posts")->with('flash_message_success', 'Publication ajoutée avec succès!');
    }

    return view("architecte.posts.add", compact("categories"));
}


}

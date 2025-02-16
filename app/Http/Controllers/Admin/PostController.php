<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BoostPublication;
use App\Models\Publication;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show()
    {
        $id = session('id');
        $posts = Publication::where(['status' => 1])->get();
        return view('admin.dashboard.posts.show', compact('posts'));
    }
    public function immo()
    {
        $id = session('id');
        $posts = Publication::where(['status' => 1, 'is_immo' => 1])->get();
        return view('admin.dashboard.posts.immo', compact('posts'));
    }

    public function boost()
    {
        $id = session('id');
        $boosts = BoostPublication::where(['state' => 2])->get();
        return view('admin.dashboard.posts.boost', compact('boosts'));
    }

    public function auto()
    {
        $id = session('id');
        $posts = Publication::where(['status' => 1, 'is_immo' => 2])->get();
        return view('admin.dashboard.posts.auto', compact('posts'));
    }

    public function delete(Request $request, $idPost)
    {
        Publication::where(['id' => $idPost])->update([
            'status' => 0
        ]);
        return redirect()->back()->with('flash_message_success', 'Publication supprimée avec succès!');
    }
}

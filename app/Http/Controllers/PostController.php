<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('blog.index', compact('posts'));
    }

    public function show(Post $post)
    {
        $post->increment('views');
        return view('admin.dashboard.blog.show', compact('post'));
    }

    public function create()
    {
        return view('admin.dashboard.blog.create');
    }




    public function edit(Post $post)
    {
        return view('blog.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $post->image = $request->file('image')->store('posts');
        }

        $post->update($request->all());

        return redirect()->route('posts.index')->with('success', 'Article mis à jour avec succès !');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Article supprimé !');
    }
}

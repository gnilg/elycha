<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;

class BlogPostsController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('blog.index', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('blog.show', compact('post'));
    }

    public function create()
    {
        return view('admin.dashboard.blog.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);


        // Création sécurisée de l'article
        $post = new Post([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'admin_id' => auth()->id(), // Ajout de l'utilisateur connecté
        ]);

        // Vérifie et stocke l'image si elle est présente
        if ($request->hasFile('image')) {
            $post->image = $request->file('image')->store('posts', 'public');
        }

        $post->save();

        return redirect()->route('blog.create')->with('success', 'Article publié avec succès !');
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

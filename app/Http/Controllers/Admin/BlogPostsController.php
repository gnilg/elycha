<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\Models\Comment;

class BlogPostsController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('admin.dashboard.blog.index', compact('posts'));
    }

    public function show(Post $post)
    {
        $post->load('comments');
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
            'image' => 'nullable|image|max:10240',
            'type' => 'required|integer',
        ]);


        // Création sécurisée de l'article
        $post = new Post([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'type' => $request->type,

        ]);

        // Vérifie et stocke l'image si elle est présente
        if ($request->hasFile('image')) {
            $post->image = $request->file('image')->store('posts', 'public');
        }

        if (auth()->guard('admin')->check()) {
            $post->admin_id = auth()->id();
        } elseif (auth()->guard('web')->check()) {
            $post->user_id = auth()->id();
        }

        $post->save();

        return redirect()->route('blog.index')->with('flash_message_success', 'Article publié avec succès !');
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

        return redirect()->route('blog.index')->with('flash_message_success', 'Post mis à jour avec succès !');
    }

    public function destroy(Post $post)

    {

        $post->delete();
        return redirect()->route('blog.index')->with('flash_message_success', 'Post supprimé !');
    }
}

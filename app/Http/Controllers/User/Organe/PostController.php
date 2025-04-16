<?php

namespace App\Http\Controllers\User\Organe;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Str;



class PostController extends Controller
{
    function index(Request $request)
    {
        $userId = auth()->user()->id;
        $posts = Post::where('type', 1 )->where(["user_id" => $userId])->get();
        return view("organe.posts.show", compact("posts"));
    }

    public function add(Request $request)
    {
        if($request->isMethod('post')){
            $request->validate([
                'title' => 'required|string|max:255',
                'content' => 'required|string',
                'image' => 'nullable|image|max:10240',

            ]);


            // Création sécurisée de l'article
            $post = new Post([
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'content' => $request->content,
                'type' => 1,

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

            return redirect('organe/posts')->with('flash_message_success', 'Article publié avec succès !');



        }
        return view('organe.blog.add');

    }

    function indexBlog(Request $request)
    {
        $userId = auth()->user()->id;
        $posts = Post::where('type', 2 )->where(["user_id" => $userId])->get();



        return view("organe.blog.show", compact("posts"));
    }


    public function addBlog(Request $request)
    {
        if($request->isMethod('post')){
            $request->validate([
                'title' => 'required|string|max:255',
                'content' => 'required|string',
                'image' => 'nullable|image|max:10240',
            ]);


            // Création sécurisée de l'article
            $post = new Post([
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'content' => $request->content,
                'type' => 2,

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

            return redirect('organe/posts/blog')->with('flash_message_success', 'Article publié avec succès !');



        }
        return view('organe.blog.add');

    }



}

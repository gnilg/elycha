<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Publication;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    function index(Request $request)
    {
        $lastPostsImmo =  Publication::where(["is_immo" => 1, "status" => 1])->orderBy('created_at', 'DESC')->limit(10)->get();
        $featuredPosts = Publication::where(["status" => 1])->orderBy('created_at', 'DESC')->limit(10)->get();
        $categories = []; //Category::where(["is_immo" => 1, "status" => 1])->orderBy('label', 'ASC')->get();
        $categories2 = []; //Category::where(["is_immo" => 2, "status" => 1])->orderBy('label', 'ASC')->get();

        $images = [
            asset('./assets/images/entreprise.jpg'),
            asset('../assets/images/entreprise2.jpg'),
            asset('assets/images/entreprise3.jpg')
        ];

        return view('index', compact('lastPostsImmo', 'categories', 'featuredPosts', 'categories2', 'images'));
    }
    public function policy(Request $request)
    {
        return view('others.policy');
    }
    public function about(Request $request)
    {
        return view('website.about');
    }
    public function cgu(Request $request)
    {
        return view('others.cgu');
    }
    public function detailsPost(Request $request, $idPost)
    {
        $post = Publication::where("id", $idPost)->first();
        $posts = Publication::where(["status" => 1, "is_immo" => $post->is_immo])->orderBy('created_at', 'DESC')->limit(4)->get();
        return view('website.details_post', compact("post", "posts"));
    }

    public function allPosts(Request $request)
    {
        $query = Publication::where(["status" => 1])->orderBy('created_at', 'DESC');

        if (isset($request->is_immo)) {
            $query = $query->where('is_immo', $request->is_immo);
        }
        $posts = $query->get();
        return view('website.all_posts', compact("posts"));
    }
}

<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Publication;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    function index(Request $request)
    {
        $lastPostsImmo =  Publication::where(["is_immo" => 1, "status" => 1])->orderBy('created_at', 'DESC')->limit(10)->get();
        $blogPosts = Post::orderBy('created_at', 'DESC')->paginate(10);
        $categories = []; //Category::where(["is_immo" => 1, "status" => 1])->orderBy('label', 'ASC')->get();
        $categories2 = []; //Category::where(["is_immo" => 2, "status" => 1])->orderBy('label', 'ASC')->get();


        $images = [
            asset('assets/images/Entreprise.jpg'),
            asset('assets/images/Entreprise2.jpg'),
            asset('assets/images/Entreprise3.jpg')
        ];

        $images2 = [
            asset('assets/images/Immo-foncier1.jpg'),
            asset('assets/images/Immo-foncier2.jpg'),
            asset('assets/images/Immo-foncier3.jpg')
        ];

        $images3 = [
            asset('assets/images/infra-1.jpg'),
            asset('assets/images/infra-2.jpg'),
            asset('assets/images/infra-3.jpg')
        ];

        $images4 = [
            asset('assets/images/energie1.jpg'),
            asset('assets/images/energie2.jpg'),
            asset('assets/images/energie3.jpg')
        ];

        $images5 = [
            asset('assets/images/securite1.jpg'),
            asset('assets/images/securite2.jpg'),
            asset('assets/images/securite3.jpg')
        ];


        return view('index', compact( 'lastPostsImmo', 'categories','images4', 'images5', 'categories2', 'images','images2','images3','blogPosts'));
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
        $post->increment('views');
        return view('website.details_post', compact("post", "posts"));
    }

    public function allPosts(Request $request)
    {
        $query = Publication::where("status", 1)->orderBy('created_at', 'DESC');

        if ($request->has('is_immo')) {
            $query->where('is_immo', $request->is_immo);
        }

        if ($request->has('type')) {
            $query->where('type', $request->type);
        }

        $posts = $query->get();

        return view('website.all_posts', compact('posts'));
    }


    public function allBlogs()
    {
        $blogPosts = Post::where('type', 2 )->orderBy('created_at', 'DESC')->paginate(10);
        return view('website.blog', compact("blogPosts"));
    }

    public function allArchitectes()
    {
        $architectePosts = Publication::where(['is_immo' => 3])->latest()->paginate(10);
        return view('website.architecte', compact("architectePosts"));
    }

    public function allSocietes()
    {
        $societePosts = Publication::where(['is_immo' => 4])->latest()->paginate(10);
        return view('website.societe', compact("societePosts"));
    }
    public function allHebdos()
    {
        $hebdoPosts = Post::where('type', 1 )->orderBy('created_at', 'DESC')->paginate(10);
        return view('website.hebdo', compact("hebdoPosts"));
    }
}

<?php

namespace App\Http\Controllers\User\Societe;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Publication;
use Illuminate\Http\Request;

class PostController extends Controller
{
    function index(Request $request)
    {
        $userId = session('id');
        $posts = Publication::where("status", ">=", 1)->where(["user_id" => $userId])->get();

        $countImmo = Publication::where("status", ">=", 1)->where(["user_id" => $userId])->where(["is_immo" => 1])->get()->count();
        $countCar = Publication::where("status", ">=", 1)->where(["user_id" => $userId])->where(["is_immo" => 2])->get()->count();

        return view("societe.posts.show", compact("posts", "countImmo", "countCar"));
    }

    function add(Request $request)
    {
        $userId = session('id');
        $categories = Category::where(["status" => 1])->get();
        if ($request->isMethod('post')) {
            $data = $request->all();
            if ($request->hasfile('photo')) {
                $imageIcon = $request->file('photo');
                $exten = $imageIcon->getClientOriginalExtension();
                $imageIconName = $request->nom . uniqid() . '.' . $exten;
                $destinationPath = myPublicPath('/photos');
                $ulpoadImageSuccess = $imageIcon->move($destinationPath, $imageIconName);
                $avatar = "/photos/" . $imageIconName;
            }
            Publication::create([
                'label' => $data['label'],
                'place' => $data['place'],
                'description' => $data['description'],
                'price' => $data['price'],
                'category_id' => $data['category'],
                'user_id' => $userId,
                'photo' => $avatar,
                'status' => 1,
                'is_immo' => Category::where(["id" => $data['category']])->first()->is_immo,
            ]);
            return redirect("/agent/posts")->with('flash_message_success', 'Publication ajoutée avec succès!');
        }

        return view("societe.posts.add", compact("categories"));
    }
}

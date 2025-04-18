<?php

namespace App\Http\Controllers\User\Agent;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Str;



class PostController extends Controller
{
    function index(Request $request)
    {
        $userId = auth()->user()->id;
        $posts = Publication::where("status", ">=", 1)->where(["user_id" => $userId])->get();

        $countImmo = Publication::where("status", ">=", 1)->where(["user_id" => $userId])->where(["is_immo" => 1])->get()->count();
        $countCar = Publication::where("status", ">=", 1)->where(["user_id" => $userId])->where(["is_immo" => 2])->get()->count();

        return view("agent.posts.show", compact("posts", "countImmo", "countCar"));
    }

    // public function adds(Request $request)
    // {
    //     $userId = auth()->id(); // Simplification de l'authentification
    //     $categories = Category::where("status", 1)->get();

    //     if ($request->isMethod('post')) {
    //         $request->validate([
    //             'label' => 'required|string|max:255',
    //             'description' => 'nullable|string',
    //             'price' => 'required|numeric|min:0',
    //             'photos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:6144',
    //         ]);

    //         $data = $request->all();
    //         $avatar = null;

    //         $publication = Publication::create([
    //             'label' => $data['label'],
    //             'place' => $data['place'],
    //             'description' => $data['description'] ?? '',
    //             'price' => $data['price'],
    //             'user_id' => $userId,
    //             'status' => 1,
    //             'is_immo' => 1,
    //         ]);


    //         if ($request->hasFile('photos')) {
    //             foreach ($request->file('photos') as $photo) {
    //                 $extension = $photo->getClientOriginalExtension();
    //                 $imageName = Str::slug($data['label']) . '-' . uniqid() . '.' . $extension;
    //                 $photo->move(public_path('photos'), $imageName);
    //                 $path = "/photos/" . $imageName;

    //                 // Associer l'image à la publication
    //                 $publication->images()->create([
    //                     'path' => $path
    //                 ]);
    //             }
    //         }

    //         return redirect("/agent/posts")->with('flash_message_success', 'Publication ajoutée avec succès!');
    //     }

    //     return view("agent.posts.add", compact("categories"));
    // }

    public function add(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'label' => 'required|string|max:255',
                'place' => 'required|string|max:255',
                'description' => 'required|string',
                'price' => 'required|numeric',
                'photos.*' => 'image|mimes:jpg,jpeg,png,webp|max:6144',
                'type' => 'required|numeric',
            ]);

            $publication = Publication::create([
                'label' => $request->label,
                'place' => $request->place,
                'description' => $request->description,
                'price' => $request->price,
                'user_id' => auth()->id(),
                'is_immo' => $request->category,
                'type' => $request->type,
                'photo' => null // temporaire
            ]);


            if ($request->hasFile('photos')) {
                foreach ($request->file('photos') as $photo) {
                    $extension = $photo->getClientOriginalExtension();
                    $imageName = Str::slug($request->label) . '-philipe' . uniqid() . '.' . $extension;
                    $photo->move(public_path('/photos'), $imageName);
                    $path = "elycha/public/photos/" . $imageName;
                    $publication->images()->create([
                        'path' => $path
                    ]);
                }
            }

            return redirect("/agent/posts")->with('flash_message_success', 'Publication ajoutée avec succès!');
        }

        return view("agent.posts.add");
    }


}

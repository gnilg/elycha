<?php

namespace App\Http\Controllers\User\Agent;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;




class PostController extends Controller
{
    function index(Request $request)
    {
        $userId = auth()->user()->id;
        $posts = Publication::where('user_id', $userId)->latest()->get();
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

    public function edit(Publication $publication){

        return view('agent.posts.edit', compact('publication'));
    }

    public function update(Request $request, Publication $publication)
    {

        $request->validate([
            'label' => 'required|string|max:255',
            'place' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'photos.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:6144',
            'type' => 'required|numeric',
            'category' => 'required|numeric',
        ]);

        $publication->update([
            'label' => $request->label,
            'place' => $request->place,
            'description' => $request->description,
            'price' => $request->price,
            'is_immo' => $request->category,
            'type' => $request->type,
        ]);



        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $extension = $photo->getClientOriginalExtension();
                $imageName = Str::slug($request->label) . '-' . uniqid() . '.' . $extension;

                // Chemin absolu vers le dossier externe
                $destination = base_path('../../public_html/storage/photos');

                // Crée le dossier s’il n’existe pas
                if (!File::exists($destination)) {
                    File::makeDirectory($destination, 0755, true);
                }

                // Déplacement physique du fichier
                $photo->move($destination, $imageName);

                // Chemin relatif public à enregistrer
                $path = "/storage/photos/" . $imageName;

                $publication->images()->create([
                    'path' => $path,
                    'photo' => $path
                ]);
            }
        }



        return redirect("/agent/posts")->with('flash_message_success', 'Publication mise à jour avec succès!');
    }

    public function destroy(Publication $publication)
    {
        $publication->status = 0;
        $publication->save();

        return redirect("/agent/posts")->with('flash_message_success', 'Publication désactivée avec succès!');
    }

    public function activate(Publication $publication){

        $publication->update([
            'status' => 1
        ]);


        return redirect("/agent/posts")->with('flash_message_success', 'Publication activé avec succès!');
    }




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
                'category' => 'required|in:0,1'
            ]);

            $publication = Publication::create([
                'label' => $request->label,
                'place' => $request->place,
                'description' => $request->description,
                'price' => $request->price,
                'user_id' => auth()->id(),
                'is_immo' => $request->category,
                'type' => $request->type,
                'photo' => null
            ]);

            if ($request->hasFile('photos')) {
                $firstImagePath = null;

                // Chemin absolu vers le dossier externe
                $externalPath = base_path('../../public_html/storage/photos');

                // Crée le dossier s’il n’existe pas
                if (!File::exists($externalPath)) {
                    File::makeDirectory($externalPath, 0755, true);
                }

                foreach ($request->file('photos') as $index => $photo) {
                    try {
                        $extension = $photo->getClientOriginalExtension();
                        $imageName = Str::slug($request->label) . '-' . uniqid() . '.' . $extension;

                        // Déplacement physique du fichier
                        $photo->move($externalPath, $imageName);

                        // Chemin relatif accessible publiquement
                        $publicPath = 'photos/'.$imageName;

                        $publication->images()->create([
                            'path' => $publicPath,
                            'photo' =>$publicPath
                        ]);

                        if ($index === 0) {
                            $firstImagePath = $publicPath;
                        }

                    } catch (\Exception $e) {
                        report($e);
                        return back()->with('flash_message_error', 'Erreur lors de l’envoi des images.');
                    }
                }

                if ($firstImagePath) {
                    $publication->update([
                        'photo' => $firstImagePath
                    ]);
                }
            }

            return redirect("/agent/posts")->with('flash_message_success', 'Publication ajoutée avec succès!');
        }



        return view('agent.posts.add');
    }


}

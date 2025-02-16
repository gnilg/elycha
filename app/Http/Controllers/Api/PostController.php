<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

use App\Http\Resources\Category as CategorieResource;
use App\Http\Resources\Publication as PublicationResource;
use App\Http\Resources\Like as LikeResource;
use App\Models\BoostPublication;
use App\Models\Image;
use App\Models\Like;
use App\Models\Publication;
use App\Models\User;
use App\Models\Video;
use App\Models\View;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{

    public function categories()
    {
        $categories = CategorieResource::collection(Category::where('status', 1)->orderBy('label', 'ASC')->get());

        return response()->json(
            $categories
        );
    }

    public function all()
    {
        $args = array();
        $args['posts'] = PublicationResource::collection(Publication::where('status', 1)->orderBy('created_at', 'DESC')->get());
        $args['videos'] = Video::where('status', 1)->orderBy('created_at', 'ASC')->get();

        $args['featured'] = PublicationResource::collection(
            Publication::join('sponsorings', 'sponsorings.publication_id', '=', 'publications.id')
                ->where('publications.status', 1)
                ->where('sponsorings.start_date', '<=', date('Y-m-d H:i:s'))
                ->where('sponsorings.end_date', '>=', date('Y-m-d H:i:s'))
                ->orderBy('sponsorings.created_at', 'DESC')
                ->get('publications.*')
        );

        return response()->json(
            $args
        );
    }

    public function videos()
    {
        return response()->json(
            Video::where('status', 1)->orderBy('created_at', 'ASC')->get()
        );
    }


    public function featured(Request $request)
    {
        $featured = PublicationResource::collection(
            Publication::join('sponsorings', 'sponsorings.publication_id', '=', 'publications.id')
                ->where('publications.status', 1)
                ->where('sponsorings.start_date', '<=', date('Y-m-d H:i:s'))
                ->where('sponsorings.end_date', '>=', date('Y-m-d H:i:s'))
                ->orderBy('sponsorings.created_at', 'DESC')
                ->get('publications.*')
        );

        if ($request['type'] !== null && intval($request->input('type')) == 0) {
            if (count($featured) < 5) {
                $featured = PublicationResource::collection(Publication::where('status', 1)->orderBy('created_at', 'DESC')->limit(5 - count($featured))->get());
            }
        }

        return response()->json(
            $featured
        );
    }

    public function allPosts(Request $request)
    {
        $term = $request->term;
        $query = Publication::join('categories', 'categories.id', '=', 'publications.category_id')
            ->where('publications.status', 1);

        if ($request->input('type') && $request['type'] !== "" && $request['type'] !== null) {
            $query->where('categories.is_immo', $request->input('type'));
        }
        if ($request->input('global_category') && $request['global_category'] !== "" && $request['global_category'] !== null) {
            $query->where('categories.type', $request->input('global_category'));
        }
        if ($request->input('specific_category') && $request['specific_category'] !== "" && $request['specific_category'] !== null) {
            $query->where('categories.id', $request->input('specific_category'));
        }

        if ($term != "") {
            $datas = explode(' ', $term);
            if (count($datas) > 1) {
                $searchTerm = strlen($datas[1]) > 2 ? $datas[1] : (count($datas) > 2 ? $datas[2] : $datas[1]);
                $query = $query->where(function ($query2) use ($searchTerm) {
                    $query2->where('description', 'like', "%$searchTerm%")
                        ->orWhere('publications.label', 'like', "%$searchTerm%")
                        ->orWhere('categories.label', 'like', "%$searchTerm%");
                });
            } else {
                $query =  $query->where(function ($query2) use ($term) {
                    $query2->where('description', 'like', "%$term%")
                        ->orWhere('publications.label', 'like', "%$term%")
                        ->orWhere('categories.label', 'like', "%$term%");
                });
            }
        }


        $posts = $query->orderBy('created_at', 'DESC')->select('publications.*');

        $perPage = $request->input('length', 10);
        $currentPage = $request->input('page', 1);
        $filteredData = $posts->paginate($perPage, ['*'], 'page', $currentPage);

        // Retourner les données filtrées avec la pagination
        return response()->json([
            'currentPage' => $filteredData->currentPage(),
            'perPage' => $filteredData->perPage(),
            'recordsFiltered' => $filteredData->total(),
            'lastPage' => $filteredData->lastPage(),
            'data' => PublicationResource::collection($filteredData->items()),
        ]);
    }

    /**
     * @group  Api Client Post
     *
     */

    public function add(Request $request, $idUser)
    {
        $args = array();
        $args['error'] = false;
        $label = $request->label;
        $place = $request->place;
        $description = $request->description;
        $price = $request->price;
        $place_lat = $request->place_lat;
        $place_long = $request->place_long;
        $description = $request->description;
        $categoryLabel = $request->category;
        $type = $request->type;
        $isImmo = $request->is_immo;
        try {
            if (User::where(['id' => $idUser])->first()) {
                $user = User::where(['id' => $idUser])->first();
                $primary = "";
                if ($request->hasfile('photo')) {
                    $imageIcon = $request->file('photo');
                    $exten = $imageIcon->getClientOriginalExtension();
                    $imageIconName = getRamdomText(10) . uniqid() . '.' . $exten;
                    $destinationPath = myPublicPath('/photos');
                    $ulpoadImageSuccess = $imageIcon->move($destinationPath, $imageIconName);
                    $primary = "/photos/" . $imageIconName;
                }

                $category = Category::where(['label' => $categoryLabel, 'is_immo' => $isImmo, 'type' => $type])->first();

                $publication = Publication::create([
                    'label' => $label,
                    'photo' => $primary,
                    'place' => $place,
                    'description' => $description,
                    'price' => $price,
                    'place_lat' => $place_lat,
                    'place_long' => $place_long,
                    'user_id' => $idUser,
                    'status' => 1,
                    'is_immo' => $category->is_immo,
                    'category_id' => $category->id
                ]);

                if ($request->hasfile('images')) {
                    $images = $request->images;

                    foreach ($images as $imageIcon) {
                        $exten = $imageIcon->getClientOriginalExtension();
                        $imageIconName = getRamdomText(10) . uniqid() . '.' . $exten;
                        $destinationPath = myPublicPath('/photos');
                        $ulpoadImageSuccess = $imageIcon->move($destinationPath, $imageIconName);
                        $primary = "/photos/" . $imageIconName;
                        Image::create([
                            'photo' => $primary,
                            'publication_id' => $publication->id
                        ]);
                    }
                }


                $args['post'] = $publication;
                $args['error'] = false;
                $args['message'] = "Publication ajoutée avec succès";
            } else {
                $args['error'] = true;
                $args['message'] = "Aucun compte associé";
            }
        } catch (\Exception $e) {
            $args['error'] = true;
            $args['error_message'] = $e->getMessage();
            $args['message'] = "Erreur survenue lors de l'ajout de la publication";
        }
        return response()->json($args);
    }


    public function edit(Request $request, $idUser, $idPublication)
    {
        $args = array();
        $args['error'] = false;
        $label = $request->label;
        $place = $request->place;
        $description = $request->description;
        $price = $request->price;
        $place_lat = $request->place_lat;
        $place_long = $request->place_long;
        $description = $request->description;
        $categoryLabel = $request->category;
        $isImmo = $request->is_immo;
        $type = $request->type;

        try {
            if (User::where(['id' => $idUser])->first()) {
                $user = User::where(['id' => $idUser])->first();
                $primary  =  Publication::where('id', $idPublication)->first()->photo;
                if ($request->hasfile('photo')) {
                    $imageIcon = $request->file('photo');
                    $exten = $imageIcon->getClientOriginalExtension();
                    $imageIconName = getRamdomText(10) . uniqid() . '.' . $exten;
                    $destinationPath = myPublicPath('/photos');
                    $ulpoadImageSuccess = $imageIcon->move($destinationPath, $imageIconName);
                    $primary = "/photos/" . $imageIconName;
                }
                $category = Category::where(['label' => $categoryLabel, 'is_immo' => $isImmo, 'type' => $type])->first();

                Publication::where('id', $idPublication)->update([
                    'label' => $label,
                    'photo' => $primary,
                    'place' => $place,
                    'description' => $description,
                    'price' => $price,
                    'place_lat' => $place_lat,
                    'place_long' => $place_long,
                    'user_id' => $idUser,
                    'status' => 1,
                    'is_immo' => $category->is_immo,
                    'category_id' => $category->id
                ]);

                if ($request->hasfile('images')) {
                    $images = $request->images;

                    foreach ($images as $imageIcon) {
                        $exten = $imageIcon->getClientOriginalExtension();
                        $imageIconName = getRamdomText(10) . uniqid() . '.' . $exten;
                        $destinationPath = myPublicPath('/photos');
                        $ulpoadImageSuccess = $imageIcon->move($destinationPath, $imageIconName);
                        $primary = "/photos/" . $imageIconName;
                        Image::create([
                            'photo' => $primary,
                            'publication_id' => $idPublication
                        ]);
                    }
                }

                $args['error'] = false;
                $args['message'] = "Publication mise à jour avec succès";
            } else {
                $args['error'] = true;
                $args['message'] = "Aucun compte associé";
            }
        } catch (\Exception $e) {
            $args['error'] = true;
            $args['error_message'] = $e->getMessage();
            $args['message'] = "Erreur survenue lors de la modification de la publication";
        }
        return response()->json($args);
    }
    public function updateStatus(Request $request, $idUser, $idPublication)
    {
        $args = array();
        $args['error'] = false;
        $status = $request->status;


        try {
            if (User::where(['id' => $idUser])->first()) {
                Publication::where('id', $idPublication)->update([
                    'status' => $status
                ]);
                $args['error'] = false;
                $args['message'] = "Publication mise à jour avec succès";
            } else {
                $args['error'] = true;
                $args['message'] = "Aucun compte associé";
            }
        } catch (\Exception $e) {
            $args['error'] = true;
            $args['error_message'] = $e->getMessage();
            $args['message'] = "Erreur survenue lors de la modification de la publication";
        }
        return response()->json($args);
    }

    public function delete(Request $request, $idUser, $idPublication)
    {
        $args = array();
        $args['error'] = false;
        try {
            $article = Publication::where(['id' => $idPublication])->first();
            $article->status = 0;
            $article->save();
            $args['message'] = "Publication supprimée avec succès";
        } catch (\Exception $e) {
            $args['error'] = true;
            $args['error_message'] = $e->getMessage();
            $args['message'] = "Erreur survenue lors de la suppression de la publication";
        }
        return response()->json($args);
    }


    public function deletePhoto(Request $request, $idUser, $idPhoto)
    {
        $args = array();
        $args['error'] = false;
        try {
            $photo = Image::where(['id' => $idPhoto])->first();
            $photo->delete();
            $args['message'] = "Image supprimée avec succès";
        } catch (\Exception $e) {
            $args['error'] = true;
            $args['error_message'] = $e->getMessage();
            $args['message'] = "Erreur survenue lors de la suppression de la photo";
        }
        return response()->json($args);
    }

    public function myPosts(Request $request, $idUser)
    {
        $posts = PublicationResource::collection(Publication::where('status', '>=', 1)->where(['user_id' => $idUser])->orderBy('created_at', 'DESC')->get());

        return response()->json(
            $posts
        );
    }

    public function favorites(Request $request, $idUser)
    {
        $posts = LikeResource::collection(Like::where(['user_id' => $idUser])->orderBy('created_at', 'DESC')->get());

        return response()->json(
            $posts
        );
    }



    /**
     * @group  Api Client Publication
     *
     */

    public function like(Request $request, $idUser)
    {
        $args = array();
        $args['error'] = false;
        $publicationId = $request->publication;

        try {
            if (User::where(['id' => $idUser])->first()) {
                $user = User::where(['id' => $idUser])->first();
                if (Publication::where(['id' => $publicationId])->first()) {
                    Like::create([
                        'publication_id' => $publicationId,
                        'user_id' => $idUser
                    ]);
                    $args['error'] = false;
                    $args['message'] = "Like ajouté avec succès";
                } else {
                    $args['error'] = true;
                    $args['message'] = "Votre compte est déjà enregistré et en attente de validation.";
                }
            } else {
                $args['error'] = true;
                $args['message'] = "Aucun compte associé";
            }
        } catch (\Exception $e) {
            $args['error'] = true;
            $args['error_message'] = $e->getMessage();
            $args['message'] = "Erreur survenue lors de la configuration de compte";
        }
        return response()->json($args);
    }

    /**
     * @group  Api Client Publication
     *
     */

    public function dislike(Request $request, $idUser)
    {
        $args = array();
        $args['error'] = false;
        $publicationId = $request->publication;
        try {
            if (User::where(['id' => $idUser])->first()) {
                $like = Like::where([
                    'publication_id' => $publicationId,
                    'user_id' => $idUser
                ])->first();
                $like->delete();

                $args['error'] = false;
                $args['message'] = "Like retiré avec succès";
            } else {
                $args['error'] = true;
                $args['message'] = "Aucun compte associé";
            }
        } catch (\Exception $e) {
            $args['error'] = true;
            $args['error_message'] = $e->getMessage();
            $args['message'] = "Erreur survenue lors de la configuration de compte";
        }
        return response()->json($args);
    }

    /**
     * @group  Api Client Publication
     *
     */

    public function search(Request $request)
    {
        $args = array();
        $args['error'] = false;
        $term = $request->term;

        try {
            $articles = Publication::join('categories', 'categories.id', '=', 'publications.category_id')
                ->where('description', 'like', "%$term%")
                ->where('publications.status', 1)
                ->orWhere('publications.label', 'like', "%$term%")
                ->orWhere('categories.label', 'like', "%$term%")->get('publications.*');

            $datas = explode(' ', $term);
            if (count($datas) > 1 && $articles->count() == 0) {
                $articles = Publication::join('categories', 'categories.id', '=', 'publications.category_id')
                    ->orWhere('description', 'like', "%$datas[1]%")
                    ->orWhere('publications.label', 'like', "%$datas[1]%")
                    ->orWhere('categories.label', 'like', "%$datas[1]%")->get('publications.*');
            }


            $args['publications'] = PublicationResource::collection(
                $articles
            );


            $args['error'] = false;
            $args['message'] = "Like ajouté avec succès";
        } catch (\Exception $e) {
            $args['error'] = true;
            $args['error_message'] = $e->getMessage();
            $args['message'] = "Erreur survenue lors de la configuration de compte";
        }
        return response()->json($args);
    }

    public function newSearch(Request $request)
    {
        $args = array();
        $args['error'] = false;
        $term = $request->term;

        try {
            $query = Publication::join('categories', 'categories.id', '=', 'publications.category_id')
                ->where('publications.status', 1);

            if ($request['type'] !== "" && $request['type'] !== null) {
                if (intval($request->input('type')) != 0) {
                    $query = $query->where('publications.is_immo', $request->input('type'));
                }
            }

            $datas = explode(' ', $term);
            if (count($datas) > 1) {
                $query = $query->where(function ($query2) use ($datas) {
                    $query2->where('description', 'like', "%$datas[1]%")
                        ->orWhere('publications.label', 'like', "%$datas[1]%")
                        ->orWhere('categories.label', 'like', "%$datas[1]%");
                });
            } else {
                $query =  $query->where(function ($query2) use ($term) {
                    $query2->where('description', 'like', "%$term%")
                        ->orWhere('publications.label', 'like', "%$term%")
                        ->orWhere('categories.label', 'like', "%$term%");
                });
            }

            $articles = $query->orderBy('created_at', 'DESC')->select('publications.*');

            $perPage = $request->input('length', 10);
            $currentPage = $request->input('page', 1);
            $filteredData = $articles->paginate($perPage, ['*'], 'page', $currentPage);


            $args['publications'] = PublicationResource::collection($filteredData->items());
            $args['currentPage'] = $filteredData->currentPage();
            $args['perPage'] = $filteredData->perPage();
            $args['recordsFiltered'] = $filteredData->total();
            $args['lastPage'] = $filteredData->lastPage();


            $args['error'] = false;
            $args['message'] = "Like ajouté avec succès";
        } catch (\Exception $e) {
            $args['error'] = true;
            $args['error_message'] = $e->getMessage();
            $args['message'] = "Erreur survenue lors de la configuration de compte";
        }
        return response()->json($args);
    }
    public function boost(Request $request, $idUser, $idPublication)
    {
        $args = array();
        $args['error'] = false;
        $duration = $request->duration;
        $price = $request->price;
        $method = $request->method;
        $phone = $request->phone;

        try {
            if (User::where(['id' => $idUser])->first()) {
                $user = User::where(['id' => $idUser])->first();

                $identifier = getRamdomText(10);

                BoostPublication::create([
                    'phone' => $phone,
                    'duration' => $duration,
                    'amount' => $price,
                    'type' => $method == "FLOOZ" ? 1 : 2,
                    'identifier' => $identifier,
                    'state' => 1,
                    'publication_id' => $idPublication
                ]);

                payWithPaygate($phone, $price, $identifier, $method);

                $args['error'] = false;
                $args['message'] = "Demande boost enregistré avec succès";
            } else {
                $args['error'] = true;
                $args['message'] = "Aucun compte associé";
            }
        } catch (\Exception $e) {
            $args['error'] = true;
            $args['error_message'] = $e->getMessage();
            $args['message'] = "Erreur survenue lors de la demande de boost";
        }
        return response()->json($args);
    }

    public function view(Request $request, $idUser, $idPublication)
    {
        $args = array();
        $args['error'] = false;
        try {
            if (!View::where(['publication_id' => $idPublication, 'user_id' => $idUser])->first()) {
                View::create([
                    'publication_id' => $idPublication,
                    'user_id' => $idUser
                ]);
            }
            $args['error'] = false;
            $args['message'] = "Nouvelle vue ajoutée avec succès";
        } catch (\Exception $e) {
            $args['error'] = true;
            $args['error_message'] = $e->getMessage();
            $args['message'] = "Erreur survenue lors de l'opération";
        }
        return response()->json($args);
    }
}

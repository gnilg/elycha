<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Resources\Inquiry as InquiryResource;
use App\Models\Inquiry;
use App\Models\User;

class InquiryController extends Controller
{

    /**
     * @group  Api Client Post
     *
     */

    public function add(Request $request, $idUser)
    {
        $args = array();
        $args['error'] = false;
        $place = $request->place;
        $description = $request->description;
        $price = $request->price;
        $description = $request->description;
        $categoryLabel = $request->category;

        try {
            if (User::where(['id' => $idUser])->first()) {
                $user = User::where(['id' => $idUser])->first();

                $category = Category::where(['label' => $categoryLabel])->first();

                Inquiry::create([
                    'place' => $place,
                    'description' => $description,
                    'price' => $price,
                    'user_id' => $idUser,
                    'status' => 1,
                    'is_immo' => $category->is_immo,
                    'category_id' => $category->id
                ]);

                $args['error'] = false;
                $args['message'] = "Demande ajoutée avec succès";
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

    public function delete(Request $request, $idUser, $idInquiry)
    {
        $args = array();
        $args['error'] = false;
        try {
            $article = Inquiry::where(['id' => $idInquiry])->first();
            $article->status = 0;
            $article->save();
            $args['message'] = "Demande supprimée avec succès";
        } catch (\Exception $e) {
            $args['error'] = true;
            $args['error_message'] = $e->getMessage();
            $args['message'] = "Erreur survenue lors de la suppression de la publication";
        }
        return response()->json($args);
    }

    public function myInquiries(Request $request, $idUser)
    {
        $posts = InquiryResource::collection(Inquiry::where(['status' => 1, 'user_id' => $idUser])->orderBy('created_at', 'DESC')->get());

        return response()->json(
            $posts
        );
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //


public function index(Request $request)
{
    $query = Publication::query()->where('is_immo', $request->is_immo);

    if ($request->filled('type')) {
        $query->where('type', $request->type);
    }

    if ($request->filled('price_min')) {
        $query->where('price', '>=', $request->price_min);
    }

    if ($request->filled('price_max')) {
        $query->where('price', '<=', $request->price_max);
    }

    if ($request->filled('quartier')) {
        $query->where('place', 'like', '%' . $request->quartier . '%');
    }


    if ($request->filled('marque')) {
        $query->where('place', 'like', '%' . $request->marque . '%');
    }

    $posts = $query->latest()->paginate(12);
    return view('website.all_posts', compact('posts'));
}

}

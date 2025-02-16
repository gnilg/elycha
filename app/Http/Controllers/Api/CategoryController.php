<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * @group  Api Category
     *
     */
    public function details(Request $request, $type, $isImmo)
    {
        $categories = Category::where(['type' => $type, 'is_immo' => $isImmo])->orderBy('label', 'ASC')->get();
        return response()->json(
            $categories
        );
    }
}

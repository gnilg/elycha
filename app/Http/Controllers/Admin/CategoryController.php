<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;

class CategoryController extends Controller
{
    public function add(Request $request)
    {
        $id = session('id');
        $categories = Category::where(['status' => 1])->get();
        if ($request->isMethod('post')) {
            $data = $request->all();
            $label = $data['label'];
            $type = $data['type'];
            $is_immo = $data['is_immo'];

            if (!Category::where(['label' => $label, 'type' => $type])->first()) {
                Category::create([
                    'label' => $label,
                    'type' => $type,
                    'is_immo' => $is_immo,
                    'status' => 1
                ]);
                return redirect()->back()->with('flash_message_success', 'Nouvelle Catégorie ajoutée avec succès!');
            } else {
                return redirect()->back()->with('flash_message_error', 'Cette catégorie existe déjà!');
            }
        }
        return view('admin.dashboard.categories.add', compact('categories'));
    }
    public function edit(Request $request, $idCategory)
    {
        $id = session('id');
        $categorie = Category::where(['id' => $idCategory])->first();
        if ($request->isMethod('post')) {
            $data = $request->all();
            $label = $data['label'];
            $type = $data['type'];
            $is_immo = $data['is_immo'];

            Category::where(['id' => $idCategory])->update([
                'label' => $label,
                'type' => $type,
                'is_immo' => $is_immo,
            ]);

            return redirect('/admin/categories')->with('flash_message_success', 'Catégorie modifiée avec succès!');
        }
        return view('admin.dashboard.categories.edit')->with(compact('categorie'));
    }
    public function show()
    {
        $id = session('id');
        $categories = Category::where(['status' => 1])->get();
        return view('admin.dashboard.categories.show', compact('categories'));
    }
    public function delete(Request $request, $idCategory)
    {
        $id = session('id');
        $categorie = Category::where(['id' => $idCategory])->first();
        Category::where(['id' => $idCategory])->update([
            'status' => 0
        ]);
        return redirect()->back()->with('flash_message_success', 'Catégorie supprimée avec succès!');
    }
}

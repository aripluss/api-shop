<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        return Category::all();
    }

    public function products($id)
    {
        return Category::with('products')->findOrFail($id); // повертає об’єкт категорії
        // $category = Category::with('products')->find($id);
        // if (!$category) {
        //     return response()->json(['message' => 'Category not found'], 404);
        // }
        // return response()->json($category->products); // повертає масив з товарами
    }


    public function addCategory(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $category = Category::create($validated);

        return response()->json($category, 201);
    }


    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $category->update($validated);

        return response()->json($category);
    }
}


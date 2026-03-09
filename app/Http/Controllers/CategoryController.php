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
}


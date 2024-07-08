<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $categories = Category::orderBy('id', 'asc')->get();

        return view('categories.index', compact('categories','user'));
    }

    public function ajaxStore(Request $request)
    {
        $request->validate(['name' => 'required']);

        $category = Category::create($request->all());

        return response()->json(['status' => true, 'message' => 'Category created successfully.', 'category' => $category]);
    }

    public function ajaxUpdate(Request $request, Category $category)
    {
        $request->validate(['name' => 'required']);
        $category->update($request->all());

        return response()->json(['status' => true, 'message' => 'Category updated successfully.', 'category' => $category]);
    }

    public function ajaxDestroy(Category $category)
    {
        $category->delete();

        return response()->json(['status' => true, 'message' => 'Category deleted successfully.']);
    }
}

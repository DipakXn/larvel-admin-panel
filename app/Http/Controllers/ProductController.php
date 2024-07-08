<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $products = Product::orderBy('id', 'asc')->get();
        $categories = Category::all();
        return view('products.index', compact('products', 'categories','user'));
    }

    public function ajaxStore(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image',
            'price' => 'required|numeric',
        ]);
    
        $path = $request->file('image')->store('images', 'public');
    
        $product = Product::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'description' => $request->description,
            'image' => $path,
            'price' => $request->price,
        ]);
    
        $categoryName = Category::find($request->category_id)->name;
    
        return response()->json([
            'status' => true,
            'message' => 'Product created successfully.',
            'product' => [
                'id' => $product->id,
                'category' => [
                    'id' => $request->category_id,
                    'name' => $categoryName,
                ],
                'name' => $product->name,
                'description' => $product->description,
                'image' => $path,
                'price' => $product->price,
            ]
        ]);
    }
    

    public function ajaxUpdate(Request $request, Product $product)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'image',
        ]);

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }

            $path = $request->file('image')->store('images', 'public');
            $product->image = $path;
        }

        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->save();


    $categoryName = Category::find($request->category_id)->name;

    // Return JSON response with category name included
    return response()->json([
        'status' => true,
        'message' => 'Product updated successfully.',
        'product' => [
            'id' => $product->id,
            'category' => [
                'id' => $request->category_id,
                'name' => $categoryName,
            ],
            'name' => $product->name,
            'description' => $product->description,
            'image' => $product->image,
            'price' => $product->price,
        ]
    ]);
    }

    public function show(Product $product)
    {
        $user = Auth::user();

        $categories = Category::all();
        return view('products.show', compact('product', 'categories','user'));
    }

    public function ajaxDestroy(Product $product)
    {
        // Delete image if exists
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return response()->json(['status' => true, 'message' => 'Product deleted successfully.']);
    }
}

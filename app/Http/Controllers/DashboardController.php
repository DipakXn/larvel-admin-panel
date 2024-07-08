<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $products = Product::latest()->take(5)->get();

       notify()->success('Welcome back to Dashboard ⚡️', 'Dashboard');
     
        return view('dashboard', compact('products', 'user'));
    }
    public function profile()
    {
        $user = Auth::user();
        $products = Product::all();

        return view('profile', compact('products', 'user'));
    }
}
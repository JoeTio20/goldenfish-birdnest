<?php

namespace App\Http\Controllers;

use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProducts = Product::where('is_active', true)->take(4)->get();
        $totalProducts = Product::count();
        $activeProducts = Product::where('is_active', true)->count();
        return view('home', compact('featuredProducts', 'totalProducts', 'activeProducts'));
    }
}

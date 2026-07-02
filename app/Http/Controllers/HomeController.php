<?php
namespace App\Http\Controllers;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        // Prioritaskan is_featured, fallback ke produk aktif terbaru
        $featuredProducts = Product::where('is_active', true)
            ->where('is_featured', true)
            ->take(4)->get();
        if ($featuredProducts->count() < 4) {
            $featuredProducts = Product::where('is_active', true)->take(4)->get();
        }
        $totalProducts  = Product::count();
        $activeProducts = Product::where('is_active', true)->count();
        return view('home', compact('featuredProducts', 'totalProducts', 'activeProducts'));
    }
}

<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->get('category', 'all');
        $sort     = $request->get('sort', 'featured');
        $search   = trim((string) $request->get('search', ''));

        $query = Product::where('is_active', true);
        if ($category !== 'all') $query->where('category', $category);
        if ($search !== '') {
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('category', 'like', "%{$search}%");
            });
        }
        if ($sort === 'price_asc') $query->orderBy('price', 'asc');
        elseif ($sort === 'price_desc') $query->orderBy('price', 'desc');
        elseif ($sort === 'newest') $query->latest();
        else $query->orderByDesc('is_featured')->oldest();

        $products = $query->get();
        return view('product', compact('products', 'category', 'sort', 'search'));
    }

    public function show(Product $product)
    {
        abort_unless($product->is_active, 404);
        $related = Product::where('is_active', true)->where('id', '!=', $product->id)->inRandomOrder()->take(3)->get();
        return view('product-detail', compact('product', 'related'));
    }
}

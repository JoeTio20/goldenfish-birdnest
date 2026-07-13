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
        $this->rememberViewedProduct($product->id);
        $related = Product::where('is_active', true)->where('id', '!=', $product->id)->inRandomOrder()->take(3)->get();
        $recentlyViewed = $this->recentlyViewedProducts($product->id);
        return view('product-detail', compact('product', 'related', 'recentlyViewed'));
    }

    public function quick(Product $product)
    {
        abort_unless($product->is_active, 404);
        return response()->json([
            'id' => $product->id,
            'name' => $product->name,
            'description' => $product->description,
            'price' => $product->price,
            'price_formatted' => 'Rp ' . number_format($product->price, 0, ',', '.'),
            'stock' => $product->stock,
            'stock_label' => $product->stock_label,
            'stock_color' => $product->stock_color,
            'thumbnail' => $product->thumbnail,
            'images' => $product->images ?: [$product->thumbnail],
            'detail_url' => route('product.show', $product),
        ]);
    }

    private function rememberViewedProduct(int $productId): void
    {
        $viewed = session('recently_viewed_products', []);
        $viewed = array_values(array_filter($viewed, fn($id) => (int) $id !== $productId));
        array_unshift($viewed, $productId);
        session(['recently_viewed_products' => array_slice($viewed, 0, 8)]);
    }

    private function recentlyViewedProducts(int $excludeId)
    {
        $ids = array_values(array_filter(session('recently_viewed_products', []), fn($id) => (int) $id !== $excludeId));
        if (empty($ids)) return collect();
        return Product::where('is_active', true)->whereIn('id', $ids)->get()->sortBy(fn($p) => array_search($p->id, $ids))->values();
    }
}

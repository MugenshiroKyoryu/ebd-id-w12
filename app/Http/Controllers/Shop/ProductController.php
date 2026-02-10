<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $q = trim((string) $request->query('q', ''));
        $categoryId = $request->query('category_id');

        $categories = Category::orderBy('name')->get();

        $productsQuery = Product::query()
            ->with('category')
            ->when($q !== '', function ($query) use ($q) {
                $query->where('name', 'like', "%{$q}%")
                      ->orWhere('description', 'like', "%{$q}%");
            })
            ->when($categoryId, function ($query) use ($categoryId) {
                $query->where('category_id', $categoryId);
            })
            ->orderByDesc('id');

        $products = $productsQuery->paginate(12)->withQueryString();

        return view('shop.products.index', compact('products', 'categories', 'q', 'categoryId'));
    }

    public function show(int $id)
    {
        $product = Product::with('category')->findOrFail($id);
        return view('shop.products.show', compact('product'));
    }
}

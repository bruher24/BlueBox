<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    public function index(): Factory|View|Application
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function form($productId = null): Factory|View|Application
    {
        $product = Product::find($productId);
        $categories = Category::all();
        return view('products.form', compact('categories', 'product'));
    }

    public function create(StoreProductRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        Product::create($validated);
        return redirect()->route('products.index')->with('success', 'Товар добавлен!');
    }

    public function update(StoreProductRequest $request, int $productId): RedirectResponse
    {
        $validated = $request->validated();
        $product = Product::findOrFail($productId);
        $product->update($validated);
        return redirect()->route('products.index')->with('success', 'Товар успешно обновлен!');
    }

    public function destroy(int $productId): RedirectResponse
    {
        Product::destroy($productId);
        return redirect()->route('products.index')->with('success', 'Товар успешно удален!');
    }

    public function details(int $productId): Factory|View|Application
    {
        $product = Product::findOrFail($productId);
        return view('products.details', compact('product'));
    }
}

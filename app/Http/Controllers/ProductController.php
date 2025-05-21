<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index(){
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function form($productId = null){
        $product = Product::find($productId);
        $categories = Category::all();
        return view('products.form', compact('categories', 'product'));
    }

    public function create(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|unique:products|max:255',
            'category_id' => 'required|in:1,2,3',
            'description' => 'required|string|max:500',
            'price' => 'required|integer',
        ]);
        Product::create($validated);
        return redirect()->route('products.index')->with('success', 'Товар добавлен!');
    }

    public function update(Request $request, int $productId){
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:products,name,'.$productId,
            'category_id' => 'required|in:1,2,3',
            'description' => 'required|string|max:500',
            'price' => 'required|integer',
        ]);

        $product = Product::findOrFail($productId);
        $product->update($validated);
        return redirect()->route('products.index')->with('success', 'Товар успешно обновлен!');

    }

    public function delete(int $productId){
        Product::destroy($productId);
        return redirect()->route('products.index')->with('success', 'Товар успешно удален!');
    }

    public function details(int $productId){
        $product = Product::findOrFail($productId);
        return view('products.details', compact('product'));
    }
}

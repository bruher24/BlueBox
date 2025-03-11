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
        return view('products.index', ['products' => Product::all()]);
    }

    public function showForm(){
        return view('products.form', ['categories' => Category::all()]);
    }

    public function addProduct(Request $request){
        $validated = $request->validate([
            'product_name' => 'required|string|unique:products|max:255',
            'category_id' => 'required|in:1,2,3',
            'description' => 'required|string|max:500',
            'price' => 'required|integer',
        ]);

        $input = $request->all();
        $product = new Product();
        $product->fill($input);
        $product->save();
        return redirect()->route('products')->with('success', 'Товар добавлен!');
    }

    public function editProduct(int $product_id){
        $product = Product::findOrFail($product_id);
        return view('products.form', ['product' => $product, 'categories' => Category::all()]);
    }

    public function updateProduct(Request $request, int $product_id){
        $validated = $request->validate([
            'product_name' => 'required|string|unique:products|max:255',
            'category_id' => 'required|in:1,2,3',
            'description' => 'required|string|max:500',
            'price' => 'required|integer',
        ]);

        $input = $request->all();
        $product = Product::findOrFail($product_id);
        $product->update($input);
        return redirect()->route('products')->with('success', 'Товар обновлен!');

    }

    public function deleteProduct(int $product_id){
        Product::destroy($product_id);
        return redirect()->route('products')->with('success', 'Товар удален!');
    }

    public function detailsProduct(int $product_id){
        $product = Product::findOrFail($product_id);
        return view('products.details', ['product' => $product]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Enums\StatusEnum;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::with('product')->get();
        return view('orders.index', compact('orders'));
    }

    public function form($orderId = null){
        $order = Order::find($orderId);
        $products = Product::all();
        return view('orders.form', compact('products', 'order'));
    }

    public function create(Request $request){
        $validated = $request->validate([
            'client_name' => 'required|string|max:255',
            'product_id' => 'required|integer',
            'quantity' => 'required|integer',
            'comment' => 'string|max:500',
            'status' => ['required', Rule::enum(StatusEnum::class)],
        ]);

        Order::create($validated);

        return redirect()->route('orders.index')->with('success', 'Заказ добавлен!');
    }

    public function complete(int $order_id){
        $order = Order::findOrFail($order_id);
        $order->status = StatusEnum::Done;
        $order->save();
        return redirect()->route('orders.details', $order_id)->with('success', 'Заказ отмечен выполненным!');
    }

    public function update(Request $request, int $order_id){
        $validated = $request->validate([
            'client_name' => 'required|string|max:255',
            'product_id' => 'required|integer',
            'quantity' => 'required|integer',
            'comment' => 'string|max:500',
            'status' => ['required', Rule::enum(StatusEnum::class)],
        ]);

        $order = Product::findOrFail($order_id);
        $order->update($validated);
        return redirect()->route('orders.index')->with('success', 'Заказ обновлен!');

    }

    public function delete(int $order_id){
        Order::destroy($order_id);
        return redirect()->route('orders.index')->with('success', 'Заказ удален!');
    }

    public function details(int $order_id){
        $order = Order::findOrFail($order_id);
        return view('orders.details', compact('order'));
    }
}

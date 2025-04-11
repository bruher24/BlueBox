<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::with('product')->get();
        return view('orders.index', compact('orders'));
    }

    public function showForm(){
        return view('orders.form', ['products' => Product::all()]);
    }

    public function addOrder(Request $request){
        $validated = $request->validate([
            'client_name' => 'required|string|max:255',
            'product_id' => 'required|integer',
            'quantity' => 'required|integer',
            'comment' => 'string|max:500',
            'status' => 'required|in:new,done',
        ]);

        $input = $request->all();
        $order = new Order();
        $order->fill($input);
        $order->save();
        return redirect()->route('orders')->with('success', 'Заказ добавлен!');
    }

    public function editOrder(int $order_id){
        $order = Order::findOrFail($order_id);
        return view('orders.form', ['order' => $order, 'products' => Product::all()]);
    }

    public function doneOrder(int $order_id){
        $order = Order::findOrFail($order_id);
        $order->status = 'done';
        $order->save();
        return redirect()->route('orders.details', $order_id)->with('success', 'Заказ отмечен выполненным!');
    }

    public function updateOrder(Request $request, int $order_id){
        $validated = $request->validate([
            'client_name' => 'required|string|max:255',
            'product_id' => 'required|integer',
            'quantity' => 'required|integer',
            'comment' => 'string|max:500',
            'status' => 'required|in:new,done',
        ]);

        $input = $request->all();
        $order = Product::findOrFail($order_id);
        $order->update($input);
        return redirect()->route('orders')->with('success', 'Заказ обновлен!');

    }

    public function deleteOrder(int $order_id){
        Order::destroy($order_id);
        return redirect()->route('orders')->with('success', 'Заказ удален!');
    }

    public function detailsOrder(int $order_id){
        $order = Order::findOrFail($order_id);
        return view('orders.details', ['order' => $order]);
    }
}

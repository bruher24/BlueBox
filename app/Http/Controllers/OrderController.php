<?php

namespace App\Http\Controllers;

use App\Enums\StatusEnum;
use App\Http\Requests\StoreOrderRequest;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class OrderController extends Controller
{
    public function index(): Factory|View|Application
    {
        $orders = Order::with('product')->get();
        return view('orders.index', compact('orders'));
    }

    public function form($orderId = null): Factory|View|Application
    {
        $order = Order::find($orderId);
        $products = Product::all();
        return view('orders.form', compact('products', 'order'));
    }

    public function create(StoreOrderRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        Order::create($validated);

        return redirect()->route('orders.index')->with('success', 'Заказ добавлен!');
    }

    public function complete(int $order_id): RedirectResponse
    {
        $order = Order::findOrFail($order_id);
        $order->status = StatusEnum::Done;
        $order->save();
        return redirect()->route('orders.details', $order_id)->with('success', 'Заказ отмечен выполненным!');
    }

    public function update(StoreOrderRequest $request, int $order_id): RedirectResponse
    {
        $validated = $request->validated();

        $order = Product::findOrFail($order_id);
        $order->update($validated);
        return redirect()->route('orders.index')->with('success', 'Заказ обновлен!');
    }

    public function delete(int $order_id): RedirectResponse
    {
        Order::destroy($order_id);
        return redirect()->route('orders.index')->with('success', 'Заказ удален!');
    }

    public function details(int $order_id): Factory|View|Application
    {
        $order = Order::findOrFail($order_id);
        return view('orders.details', compact('order'));
    }
}

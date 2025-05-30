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

    public function complete(int $orderId): RedirectResponse
    {
        $order = Order::findOrFail($orderId);
        $order->status = StatusEnum::Done;
        $order->save();
        return redirect()->route('orders.details', $orderId)->with('success', 'Заказ отмечен выполненным!');
    }

    public function update(StoreOrderRequest $request, int $orderId): RedirectResponse
    {
        $validated = $request->validated();
        $order = Product::findOrFail($orderId);
        $order->update($validated);
        return redirect()->route('orders.index')->with('success', 'Заказ обновлен!');
    }

    public function destroy(int $orderId): RedirectResponse
    {
        Order::destroy($orderId);
        return redirect()->route('orders.index')->with('success', 'Заказ удален!');
    }

    public function details(int $orderId): Factory|View|Application
    {
        $order = Order::findOrFail($orderId);
        return view('orders.details', compact('order'));
    }
}

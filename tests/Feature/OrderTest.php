<?php

namespace Tests\Feature;

use App\Enums\StatusEnum;
use App\Models\Order;
use App\Models\Product;
use Tests\TestCase;
use Faker\Factory;

class OrderTest extends TestCase
{
    public function testCreateOrder()
    {
        $data = [
            'client_name' => Factory::create()->name(),
            'product_id' => Product::all()->last()->id ?? 1,
            'quantity' => Factory::create()->numberBetween(1, 100),
            'comment' => Factory::create()->text(500),
            'status' => StatusEnum::New->value,
        ];

        $response = $this->post(route('orders.create'), $data);
        $response->assertRedirect(route('orders.index'));
        return Order::all()->last();
    }

    public function testIndexOrder()
    {
        $response = $this->get(route('orders.index'));
        $response->assertStatus(200);
        $response->assertViewIs('orders.index');
    }

    /**
     * @depends testCreateOrder
     */
    public function testUpdateOrder(Order $order)
    {
        $response = $this->put(route('orders.complete', $order->id));
        $response->assertRedirect(route('orders.details', $order->id));
        return Order::all()->last();
    }

    /**
     * @depends testUpdateOrder
     */
    public function testShowOrder(Order $order)
    {
        $response = $this->get(route('orders.details', $order->id));
        $response->assertStatus(200);
        $response->assertViewIs('orders.details');
    }

    /**
     * @depends testUpdateOrder
     */
    public function testDeleteOrder(Order $order)
    {
        $response = $this->delete(route('orders.delete', $order->id));
        $response->assertRedirect(route('orders.index'));
    }
}

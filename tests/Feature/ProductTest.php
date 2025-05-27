<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use Tests\TestCase;
use Faker\Factory;

class ProductTest extends TestCase
{
    public function testCreateProduct()
    {
        $data = [
            'name' => Factory::create()->text(10),
            'category_id' => Category::all()->random()->id,
            'description' => Factory::create()->text(50),
            'price' => Factory::create()->randomFloat(2, 10),
        ];

        $response = $this->post(route('products.create'), $data);
        $response->assertRedirect(route('products.index'));
        return Product::all()->last();
    }

    public function testIndexProduct()
    {
        $response = $this->get(route('products.index'));
        $response->assertStatus(200);
        $response->assertViewIs('products.index');
    }

    /**
     * @depends testCreateProduct
     */
    public function testUpdateProduct(Product $product)
    {
        $data = [
            'product_id' => $product->id,
            'name' => Factory::create()->text(10),
            'category_id' => Category::all()->except(['id' => $product->category_id])->random()->id,
            'description' => Factory::create()->text(50),
            'price' => Factory::create()->randomFloat(2, 50),
        ];

        $response = $this->put(route('products.update', $data));
        $response->assertRedirect(route('products.index'));
        return Product::all()->last();
    }

    /**
     * @depends testUpdateProduct
     */
    public function testShowProduct(Product $product)
    {
        $response = $this->get(route('products.details', $product->id));
        $response->assertStatus(200);
        $response->assertViewIs('products.details');
    }

    /**
     * @depends testUpdateProduct
     */
    public function testDeleteProduct(Product $product)
    {
        $response = $this->delete(route('orders.delete', $product->id));
        $response->assertRedirect(route('orders.index'));
    }
}

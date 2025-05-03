<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Order;
use App\Models\Customer;

class OrdersControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_store_order()
    {
        $customer = Customer::factory()->create();

        $data = [
            'customer_id' => $customer->id,
            'product_name' => 'Test Product',
            'quantity' => 3,
            'price' => 99.99,
            'status' => 'pending',
        ];

        $response = $this->postJson('/api/orders', $data);

        $response->assertStatus(201)
                 ->assertJsonStructure([
                     'payload' => ['id', 'product_name', 'quantity', 'price'],
                     'success',
                     'message'
                 ]);
    }

    public function test_can_update_order()
    {
        $customer = Customer::factory()->create();
        $order = Order::factory()->create(['customer_id' => $customer->id]);

        $updateData = [
            'customer_id' => $customer->id,
            'product_name' => 'Updated Product',
            'quantity' => 5,
            'price' => 149.99,
            'status' => 'shipped',
        ];

        $response = $this->putJson("/api/orders/{$order->id}", $updateData);

        $response->assertStatus(200)
                 ->assertJsonFragment(['product_name' => 'Updated Product']);
    }
}

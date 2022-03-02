<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @return void
     */
    public function it_returns_a_successful_response()
    {
        $response = $this->get('/');

        $response->assertRedirect(route('product.index'));
    }

    /**
     * @test
     * @return void
     */
    public function it_has_a_product_addition_form()
    {
        $response = $this->get('/product');

        $response->assertSee('ean13')
            ->assertSee('name')
            ->assertSee('stock')
            ->assertSee('cost')
            ->assertSee('price');
    }

    /**
     * @test
     * @return void
     */
    public function it_can_add_product()
    {
        $product = Product::factory()->makeOne();

        $this->post('/product', $product->toArray());

        $this->assertDatabaseHas('products', [
            'ean13' => $product->ean13,
            'name' => $product->name,
            'stock' => $product->stock,
            'cost' => $product->cost,
            'price' => $product->price,
        ]);
    }

    /**
     * @test
     * @return void
     */
    public function it_can_see_product()
    {
        $product = Product::factory()->createOne();

        $response = $this->get('/product');

        $response->assertSee($product->ean13)
            ->assertSee($product->name)
            ->assertSee($product->stock)
            ->assertSee($product->cost)
            ->assertSee($product->price);
    }

    /**
     * @test
     * @return void
     */
    public function it_can_order_products()
    {
        Product::factory()
            ->count(5)
            ->create();

        $products = Product::orderBy('name', 'desc')->get();

        $response = $this->get('/product?name=desc');

        $response->assertSeeInOrder($products->pluck('ean13')->toArray());
    }

    /**
     * @test
     * @return void
     */
    public function it_does_not_order_weird_columns()
    {
        Product::factory()
            ->count(5)
            ->create();

        $products = Product::all();

        $response = $this->get('/product?ean=desc');

        $response->assertSeeInOrder($products->pluck('ean13')->toArray());
    }
}

<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'order_code' => $this->faker->postcode,
            'product_id' => function () {
                return Product::factory()->create()->id;
            },
            'quantity' => $this->faker->numberBetween(0,10),
            'address' => $this->faker->city,
            'user_id' => function () {
                return User::factory()->create()->id;
            },
        ];
    }
}

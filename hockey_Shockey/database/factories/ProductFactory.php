<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use App\Models\ProductCategoryType;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categoryIds = [1, 2, 3, 4];
        $productCategoryTypeId = $this->faker->randomElement($categoryIds);

        return [
            'product_name' => $this->faker->word,
            'product_description' => $this->faker->sentence,
            'short_description' => $this->faker->words($this->faker->numberBetween(2, 3), true),
            'product_image' => $this->faker->imageUrl(),
            'product_size' => $this->faker->randomElement(['Small', 'Medium', 'Large']),
            'price' => $this->faker->randomFloat(2, 10, 100),
            'availability_status' => $this->faker->randomElement(['available', 'out_of_stock']),
            'product_category_type_id' => $productCategoryTypeId
        ];
    }
}



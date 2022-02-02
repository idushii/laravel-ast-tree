<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\ObjectItem;
use App\Models\ServiceItem;

class ServiceItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ServiceItem::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(4),
            'template' => $this->faker->randomElement(["Companies","CompleteSet","Moving","LoadingUnloading"]),
            'size' => $this->faker->numberBetween(-10000, 10000),
            'active' => $this->faker->boolean,
            'object_item_id' => ObjectItem::factory(),
        ];
    }
}

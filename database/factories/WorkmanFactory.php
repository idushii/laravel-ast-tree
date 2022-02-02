<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Workman;

class WorkmanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Workman::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'employed_id' => $this->faker->word,
            'fio' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'phone' => $this->faker->phoneNumber,
            'comment' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'year_birth' => $this->faker->numberBetween(-10000, 10000),
            'passport' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'inn' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'bank_card' => $this->faker->regexify('[A-Za-z0-9]{100}'),
        ];
    }
}

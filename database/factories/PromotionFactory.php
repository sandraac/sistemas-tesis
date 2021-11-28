<?php

namespace Database\Factories;

use App\Models\Promotion;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class PromotionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Promotion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'discount_rate'=> 1/rand(1,100),
            'start_date'=> Carbon::now(),
            'ending_date'=> Carbon::today()->addDays(rand(1, 30)),
        ];
    }
}

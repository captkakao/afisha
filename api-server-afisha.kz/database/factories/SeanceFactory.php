<?php

namespace Database\Factories;

use App\Models\Hall;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class SeanceFactory extends Factory
{
    private array $priceAdult = [
        4000, 3900, 3700, 3500, 3200, 3000, 2800, 2600
    ];

    private array $priceStudent = [
        2500, 2400, 2200, 2100, 2000, 1800, 1700, 1600, 1500, null
    ];

    private array $priceKid = [
        1300, 1200, 1100, 1000, 900, 800, 700, 600, 500, null, null
    ];

    private array $priceVIP = [
        12000, 10000, 9000, 8000, 7000, null, null, null
    ];

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $hallId = $this->faker->numberBetween(1, 3);
        return [
            'show_time'     => $this->faker->dateTimeBetween('now', '+2 days'),
            'price_adult'   => $this->faker->randomElement($this->priceAdult),
            'price_kid'     => $this->faker->randomElement($this->priceKid),
            'price_student' => $this->faker->randomElement($this->priceStudent),
            'price_vip'     => $this->faker->randomElement($this->priceVIP),
            'movie_id'      => $this->faker->numberBetween(1, 9),
            'hall_id'       => $hallId,
            'hall_config'   => Hall::where('id', $hallId)->value('hall_config_example'),
        ];
    }
}

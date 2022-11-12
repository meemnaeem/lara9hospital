<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
                'registration_no' => $this->faker->numberBetween(0, 1000),
                'registration_date' => $this->faker->date(),
                'name' => $this->faker->name,
                'user_id' => User::all()->random()->id,
        ];
    }
}

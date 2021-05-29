<?php

namespace Database\Factories;

use App\Models\EletronicPoint;
use Illuminate\Database\Eloquent\Factories\Factory;

class EletronicPointFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EletronicPoint::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name"  => $this->faker->name,
            "email" => $this->faker->unique()->safeEmail(),
            "cpf"   => $this->faker->cpf,
            "cell"  => $this->faker->phoneNumber
        ];
    }
}

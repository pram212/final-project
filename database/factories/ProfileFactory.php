<?php

namespace Database\Factories;

use App\Models\Profile;
// use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Profile::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {   
        return [
            'firstname' => $this->faker->firstName(),
            'lastname' => $this->faker->lastName(),
            'bio' => $this->faker->text(),
            'gender' => $this->faker->randomElement($array = array ('male','female')),
            'phone' => $this->faker->unique()->phoneNumber(),
            'address' => $this->faker->streetAddress(),
            'age' =>$this->faker->numberBetween($min=20, $max=35),
        ];
    }
}

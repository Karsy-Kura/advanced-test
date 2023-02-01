<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    return [
      //
      'fullname' => $this->faker->name,
      'gender' => $this->faker->numberBetween(1,2),
      'email' => $this->faker->email(),
      'postcode' => substr_replace($this->faker->postcode(), '-', 3 , 0),
      'address' => substr($this->faker->address(), 8),
      'opinion' => $this->faker->text(120),
    ];
  }
}

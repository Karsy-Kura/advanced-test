<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Consts\ParamConst;

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
      ParamConst::PARAM_FULLNAME => $this->faker->name,
      ParamConst::PARAM_GENDER => $this->faker->numberBetween(1,2),
      ParamConst::PARAM_EMAIL => $this->faker->email(),
      ParamConst::PARAM_POSTCODE => substr_replace($this->faker->postcode(), '-', 3 , 0),
      ParamConst::PARAM_ADDRESS => substr($this->faker->address(), 8),
      ParamConst::PARAM_OPINION => $this->faker->text(120),
    ];
  }
}

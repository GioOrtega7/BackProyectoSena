<?php

namespace Database\Factories;

use App\Models\ActivationCompanyUser;
use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;


class ActivationCompanyUserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ActivationCompanyUser::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'     => User::inRandomOrder()->first()->id,
            'state_id'    => $this->faker->randomElement([1, 2]),
            'company_id'  => Company::inRandomOrder()->first()->id,
            'fechaInicio' => $this->faker->date,
            'fechaFin'    => Carbon::now()->addDays($this->faker->numberBetween(1, 30)),//now(),//$this->faker->date,
        ];
    }
}

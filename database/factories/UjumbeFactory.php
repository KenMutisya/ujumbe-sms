<?php

namespace Kenmush\UjumbeSMS\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Kenmush\UjumbeSMS\Models\Ujumbe;


class UjumbeFactory extends Factory
{
    protected $model = Ujumbe::class;

    public function definition()
    {
        return [
                'uuid'                 => $this->faker->uuid(),
                'response_code'        => $this->faker->countryCode(),
                'response_type'        => $this->faker->country(),
                'response_description' => $this->faker->country(),
                'recipients'           => $this->faker->randomNumber(),
                'credits_deducted'     => $this->faker->randomNumber(),
                'available_credits'    => $this->faker->randomNumber(),
                'user_email'           => $this->faker->safeColorName,
                'message'              => $this->faker->dateTimeThisMonth(),
                'message_sent_at'      => $this->faker->dateTimeThisMonth(),
                'meta'                 => $this->faker->paragraph(),
        ];
    }
}


<?php

namespace Database\Factories;

use App\Models\Actor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ActorFactory extends Factory
{
    protected $model = Actor::class;

    public function definition()
    {
        return [
			'sex_id' => $this->faker->name,
			'act_nombre' => $this->faker->name,
        ];
    }
}

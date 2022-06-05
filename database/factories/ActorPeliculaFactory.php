<?php

namespace Database\Factories;

use App\Models\ActorPelicula;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ActorPeliculaFactory extends Factory
{
    protected $model = ActorPelicula::class;

    public function definition()
    {
        return [
			'act_id' => $this->faker->name,
			'pel_id' => $this->faker->name,
			'apl_papel' => $this->faker->name,
        ];
    }
}

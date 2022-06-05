<?php

namespace Database\Factories;

use App\Models\Genero;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class GeneroFactory extends Factory
{
    protected $model = Genero::class;

    public function definition()
    {
        return [
			'gen_nombre' => $this->faker->name,
        ];
    }
}

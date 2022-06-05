<?php

namespace Database\Factories;

use App\Models\Sexo;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SexoFactory extends Factory
{
    protected $model = Sexo::class;

    public function definition()
    {
        return [
			'sex_nombre' => $this->faker->name,
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Socio;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SocioFactory extends Factory
{
    protected $model = Socio::class;

    public function definition()
    {
        return [
			'soc_cedula' => $this->faker->name,
			'soc_nombre' => $this->faker->name,
			'soc_direccion' => $this->faker->name,
			'soc_telefono' => $this->faker->name,
			'soc_correo' => $this->faker->name,
        ];
    }
}

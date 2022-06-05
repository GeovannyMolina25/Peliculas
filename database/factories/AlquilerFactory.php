<?php

namespace Database\Factories;

use App\Models\Alquiler;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AlquilerFactory extends Factory
{
    protected $model = Alquiler::class;

    public function definition()
    {
        return [
			'soc_id' => $this->faker->name,
			'pel_id' => $this->faker->name,
			'alq_fecha_desde' => $this->faker->name,
			'alq_fecha_hasta' => $this->faker->name,
			'alq_valor' => $this->faker->name,
			'alq_fecha_entrega' => $this->faker->name,
        ];
    }
}

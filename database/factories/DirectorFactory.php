<?php

namespace Database\Factories;

use App\Models\Director;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DirectorFactory extends Factory
{
    protected $model = Director::class;

    public function definition()
    {
        return [
			'dir_nombre' => $this->faker->name,
        ];
    }
}

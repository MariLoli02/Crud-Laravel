<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $this->faker->addProvider(new \Mmo\Faker\PicsumProvider($this->faker));

        return [
            'nombre'=>$this->faker->unique()->word(),
            'descripcion'=>$this->faker->text(),
            'activo'=>$this->faker->randomElement(['si', 'no']),
            'image'=>"img/".$this->faker->picsum('public/storage/img/', 640, 480, null, false),
            'category_id'=>Category::all()->random()->id
        ];
    }
}

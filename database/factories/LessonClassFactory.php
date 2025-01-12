<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LessonClassFactory extends Factory
{
    protected $model = \App\Models\LessonClass::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'image' => $this->faker->imageUrl(640, 480, 'class', true),
        ];
    }
}

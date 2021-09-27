<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

            return [
                'title' => $this->faker->sentence,
                'content' => $this->faker->sentence,
                'image' => 'photo1.png',
                'date' => '27/10/01', // password
                'views' => $this->faker->numberBetween(0,5000),
                'category_id' => 1,

                'status' =>1,
                'is_featured' => 0

            ];

    }

}

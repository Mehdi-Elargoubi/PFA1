<?php

namespace Database\Factories;
//namespace My\Fancy\Models;

use Database\Factories\SomeFancyFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
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
     * @return array<string, mixed>
     */
    public function definition()
    {
        //$title=$this->faker->title();
        $title=$this->faker->realText($maxNbChars=30,$indexSize=2);
        return [
            //
            'title' => $title,
            'slug' => Str::slug($title),
            'body' => $this->faker->text(),
            'image' => $this->faker->imageUrl(640,480) ,
        ];
    }
}

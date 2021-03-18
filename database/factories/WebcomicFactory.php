<?php

namespace Database\Factories;

use App\Models\Webcomic;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class WebcomicFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Webcomic::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => Str::ucfirst($this->faker->word),
            'slug' => $this->faker->slug(2),
            'author' => $this->faker->name
        ];
    }
}

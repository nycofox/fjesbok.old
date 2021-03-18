<?php

namespace Database\Factories;

use App\Models\Webcomic;
use App\Models\WebcomicSource;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class WebcomicSourceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = WebcomicSource::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => Str::ucfirst($this->faker->word),
            'webcomic_id' => Webcomic::factory()->create()->id,
            'homepage' => $this->faker->url,
            'scraper' => 'default',
        ];
    }
}

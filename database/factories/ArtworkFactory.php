<?php

namespace Database\Factories;

use App\Models\Artwork;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArtworkFactory extends Factory
{
    protected $model = Artwork::class;

    public function definition()
    {
        $tags = [$this->faker->word(), $this->faker->word()];
        return [
            'user_id' => 1,
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'image' => 'seed/sample'.rand(1,5).'.jpg',
            'category' => $this->faker->randomElement(['painting','digital','photography']),
            'tags' => $tags,
            'likes_count' => rand(0,200),
            'views_count' => rand(0,2000),
            'nsfw_score' => rand(0,100)/100,
            'ai_generated_score' => rand(0,100)/100,
            'moderation_status' => 'approved',
            'authenticity_label' => 'Human Made',
        ];
    }
}

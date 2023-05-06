<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ressources>
 */
class RessourcesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->word();
        $content = fake()->paragraph();
        $slug = fake()->word();
        $file = "file.mp4";
        $icon = "icon.png";
        $category_id = fake()->randomDigit();
        $user_id = fake()->randomDigit();
        $type_id= fake()->randomDigit();

        return [
        'category_id' => $category_id,
        'user_id'=> $user_id,
        'type_id'=> $type_id,
        'title'=> $title,
        'content'=> $content,
        'slug'=> $slug,
        'file'=> $file,
        'icon'=> $icon,
        ];
    }
}

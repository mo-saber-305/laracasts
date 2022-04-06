<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $usersIds = User::query()->pluck('id')->toArray();
        $usersKey = array_rand($usersIds);
        $categoriesIds = Category::query()->pluck('id')->toArray();
        $categoriesKey = array_rand($categoriesIds);
        $title = $this->faker->unique()->words(10, true);

        return [
            'user_id' => $usersIds[$usersKey],
            'category_id' => $categoriesIds[$categoriesKey],
            'slug' => \Str::slug($title, '-'),
            'title' => $title,
            'body' => $this->faker->paragraphs(5, true),
            'image' => 'images/posts/' . $this->faker->randomElement(['illustration-1.png', 'illustration-2.png', 'illustration-3.png', 'illustration-4.png', 'illustration-5.png']),
            'published_at' => Carbon::now(),
        ];
    }
}

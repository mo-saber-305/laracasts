<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $postsIds = Post::query()->pluck('id')->toArray();
        $postsKey = array_rand($postsIds);

        $usersIds = User::query()->pluck('id')->toArray();
        $usersKey = array_rand($usersIds);

        return [
            'post_id' => $postsIds[$postsKey],
            'user_id' => $usersIds[$usersKey],
            'body' => $this->faker->paragraphs(2, true),
        ];
    }
}

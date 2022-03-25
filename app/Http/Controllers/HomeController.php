<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;

class HomeController extends Controller
{
    public function home()
    {
        $posts = Post::query()
            ->filter(\request(['category', 'search', 'author']))->latest('published_at')->paginate(9);

        return view('home', compact('posts'));
    }

    public function post(Post $post)
    {
        return view('post', compact('post'));
    }

    public function categoryPosts(Category $category)
    {
        $posts = $category->posts;
        return view('category-posts', compact('posts'));
    }

    public function authorPosts(User $author)
    {
        $posts = $author->posts;
        return view('author-posts', compact('posts'));
    }
}

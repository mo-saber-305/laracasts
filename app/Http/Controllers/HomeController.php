<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        $posts = Post::query();
        $categorySlug = $request->has('category') ? $request->get('category') : null;

        if ($categorySlug != null) {
            $category = Category::query()->where('slug', $categorySlug)->firstOrFail();
            $posts = $posts->where('category_id', $category->id);
            $categoryId = $category->id;
        }

        $posts = $posts->latest('published_at')->get();

        $categories = Category::query()->get();

        $categoryId = $categoryId ?? null;

        return view('home', compact('posts', 'categories', 'categoryId'));
    }

    public function post(Post $post)
    {
        return view('post', compact('post'));
    }

    public function category(Category $category)
    {
        $posts = $category->posts;
        return view('category', compact('posts'));
    }
}

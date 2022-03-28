<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

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
        $comments = $post->comments;
        return view('post', compact('post', 'comments'));
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

    public function storeComment(Post $post, Request $request)
    {
        $request->validate([
            'body' => 'required'
        ]);

        $post->comments()->create([
            'user_id' => $request->user()->id,
            'body' => $request->body
        ]);

        return redirect()->back();
    }
}

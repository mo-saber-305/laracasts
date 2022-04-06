<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        dd($user);
    }

    public function authorPosts(User $author)
    {
        $posts = $author->posts;
        return view('pages.posts.author-posts', compact('posts'));
    }


    public function create()
    {
        $categories = Category::all();
        return view('pages.posts.create', compact('categories'));
    }


    public function store(Request $request)
    {
        $attributes = $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png',
            'title' => 'required',
            'slug' => ['required', Rule::unique('categories', 'slug')],
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
        ]);

        $fileName = $request->image->hashName();
        $path = public_path('images/posts');
        $request->image->move($path, $fileName);
        $image = "images/posts/{$fileName}";

        $attributes['user_id'] = $request->user()->id;
        $attributes['image'] = $image;
        $attributes['published_at'] = Carbon::now();

        Post::query()->create($attributes);

        emotify('success', 'the post has been saved successfully');

        return redirect()->route('home');
    }


    public function show(Post $post)
    {
        $comments = $post->comments;
        return view('pages.posts.show', compact('post', 'comments'));
    }


    public function edit(Post $post)
    {
        abort_if(auth()->user()->id != $post->user_id, 404);
        $categories = Category::all();
        return view('pages.posts.edit', compact('post', 'categories'));
    }


    public function update(Request $request, Post $post)
    {
        $validate = $request->validate([
            'image' => 'image|mimes:jpg,jpeg,png',
            'title' => 'required',
            'slug' => 'required',
            'body' => 'required',
            'category_id' => 'required',
        ]);
        $array = array_splice($validate, 1);

        if ($request->has('image')) {
            $postImage = explode('/', $post->image);

            if (!in_array($postImage[2], ["illustration-1.png", "illustration-2.png", "illustration-3.png", "illustration-4.png", "illustration-5.png"])) {
                \File::delete($post->image);
            }

            $fileName = $request->image->hashName();
            $path = 'images/posts';
            $request->image->move($path, $fileName);
            $array['image'] = "$path/$fileName";
        }

        $post->update($array);

        emotify('success', 'the post has been updated successfully');

        return redirect()->route('posts.show', $post->slug);
    }


    public function destroy(Post $post)
    {
        $postImage = explode('/', $post->image);

        if (!in_array($postImage[2], ["illustration-1.png", "illustration-2.png", "illustration-3.png", "illustration-4.png", "illustration-5.png"])) {
            \File::delete($post->image);
        }

        $post->delete();

        emotify('error', 'the post has been deleted successfully');

        return redirect()->route('home');
    }
}

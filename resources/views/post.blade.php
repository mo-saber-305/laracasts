@extends('layouts.frontend')

@section('content')
    <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
        <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
            <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                <img src="{{ asset('images/illustration-1.png') }}" alt="" class="rounded-xl">

                <p class="mt-4 block text-gray-400 text-xs">
                    Published
                    <time>{{ $post->published_at->diffForHumans() }}</time>
                </p>

                <div class="flex items-center lg:justify-center text-sm mt-4">
                    <img src="{{ asset('images/lary-avatar.svg') }}" alt="Lary avatar">
                    <div class="ml-3 text-left">
                        <h5 class="font-bold">{{ $post->author->name }}</h5>
                        <h6>Mascot at Laracasts</h6>
                    </div>
                </div>
            </div>

            <div class="col-span-8">
                <div class="hidden lg:flex justify-between mb-6">
                    <a href="{{ route('home') }}"
                       class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                        <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                            <g fill="none" fill-rule="evenodd">
                                <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                </path>
                                <path class="fill-current"
                                      d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                </path>
                            </g>
                        </svg>

                        Back to Posts
                    </a>

                    <div class="space-x-2">
                        <x-category-button :category="$post->category"/>
                    </div>
                </div>

                <h1 class="font-bold text-3xl lg:text-4xl mb-10">{{ $post->excerpt }}</h1>

                <div class="space-y-4 lg:text-lg leading-loose">
                    <p>{{ $post->body }}</p>
                </div>

                <hr class="my-4"/>

                <!-- comment form -->
                @auth
                    <div class="flex items-center justify-center mb-4 mx-auto shadow-lg">
                        <form action="{{ route('posts.store.comment', $post->slug) }}" method="post"
                              class="bg-white max-w-xl p-4 rounded-lg w-full">
                            @csrf
                            <div class="flex flex-wrap -mx-3 ">
                                <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg">Add a new comment</h2>
                                <div class="w-full md:w-full px-3 mb-2 mt-2">
                                <textarea
                                    class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"
                                    name="body" placeholder="Type Your Comment" required=""></textarea>
                                </div>
                                <div class="w-full md:w-full flex items-start md:w-full px-3">
                                    <div class="ml-auto">
                                        <input type="submit"
                                               class="bg-white text-gray-700 font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100"
                                               value="Post Comment">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="block text-blue-500 text-center font-bold">login to leave a
                        comment</a>
                @endauth

                {{--comments--}}
                <div class="flex-row space-y-5 mt-4 justify-center">
                    @foreach($comments as $comment)
                        <x-comment-post :post="$post" :comment="$comment"/>
                    @endforeach
                </div>
            </div>

        </article>


    </main>
@endsection

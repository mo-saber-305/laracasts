@extends('layouts.frontend')

@section('content')
    <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
        <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
            <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                <img src="{{ asset($post->image) }}" alt="" class="rounded-xl">

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

                @auth
                    @if(auth()->user()->id == $post->user_id)
                        <div class="mt-6">
                            <a href="{{ route('posts.edit', $post->slug) }}"
                               class="mr-2 px-4 py-2 border border-green-600 rounded-full bg-green-600 text-white  uppercase font-semibold"
                               style="font-size: 10px">Edit Post</a>

                            <button
                                class="px-4 py-2 border border-red-600 rounded-full bg-red-600 text-white uppercase font-semibold focus:outline-none"
                                style="font-size: 10px" onclick="openModal('modal')">Delete Post
                            </button>

                            <div id="modal"
                                 class="fixed hidden z-50 inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto h-full w-full px-4">
                                <div class="relative top-10 mx-auto shadow-lg rounded-md bg-white max-w-md">

                                    <!-- Modal header -->
                                    <div
                                        class="flex justify-between items-center text-white text-xl rounded-t-md px-4 py-2"
                                        style="background: #122640;">
                                        <h3>Delete post</h3>
                                        <button onclick="closeModal()">x</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="max-h-48 p-4">
                                        <h3 class="mb-0 font-bold">are you sure to delete this post ?</h3>
                                    </div>

                                    <!-- Modal footer -->
                                    <div
                                        class="px-4 py-2 border-t border-t-gray-500 flex justify-end items-center space-x-4">
                                        <button
                                            class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition text-sm"
                                            onclick="closeModal()">Close
                                        </button>
                                        <form action="{{ route('posts.destroy', $post->slug) }}" method="post">
                                            @csrf
                                            @method('delete')

                                            <button
                                                class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-700 transition text-sm"
                                                onclick="closeModal()">Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>


                        </div>
                    @endif
                @endauth
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

                <h1 class="font-bold text-3xl lg:text-4xl mb-10">{{ $post->title }}</h1>

                <div class="space-y-4 lg:text-lg leading-loose">
                    <p>{{ $post->body }}</p>
                </div>

                <hr class="my-4"/>

                <!-- comment form -->
                @auth
                    <x-comment-form :post="$post"/>
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

@section('script')
    <script type="text/javascript">
        function openModal(modalId) {
            modal = document.getElementById(modalId)
            modal.classList.remove('hidden')
        }

        function closeModal() {
            modal = document.getElementById('modal')
            modal.classList.add('hidden')
        }
    </script>
@endsection

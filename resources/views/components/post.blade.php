@props(['post', 'loop'])

<article
    {{ $attributes->merge(['class' => 'transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl']) }}>
    <div class="py-6 px-5">
        <div>
            <img src="{{ asset('images/illustration-3.png') }}" alt="Blog Post illustration"
                 class="rounded-xl">
        </div>

        <div class="mt-8 flex flex-col justify-between">
            <header>
                <div class="space-x-2">
                    <x-category-button :category="$post->category"/>
                    <a href="#"
                       class="px-3 py-1 border border-red-300 rounded-full text-red-300 text-xs uppercase font-semibold"
                       style="font-size: 10px">Updates</a>
                </div>

                <div class="mt-4">
                    <h1>
                        {{ Str::limit($post->title, $loop > 2 ? 20 : 30) }}
                    </h1>

                    <span class="mt-2 block text-gray-400 text-xs">
                        Published <time>{{ $post->published_at->diffForHumans() }}</time>
                    </span>
                </div>
            </header>

            <div class="text-sm mt-4">
                <p>{{ Str::limit($post->body, 200) }}</p>
            </div>

            <footer class="flex justify-between items-center mt-8">
                <a href="{{ route('author-posts', $post->author->username) }}">
                    <div class="flex items-center text-sm">
                        <img src="{{ asset('images/lary-avatar.svg') }}" alt="Lary avatar">
                        <div class="ml-3">
                            <h5 class="font-bold">{{ $post->author->name }}</h5>
                            <h6>Mascot at Laracasts</h6>
                        </div>
                    </div>
                </a>


                <div>
                    <a href="{{ route('posts.show', $post->slug) }}"
                       class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8"
                    >Read More</a>
                </div>
            </footer>
        </div>
    </div>
</article>

@props(['post', 'loop'])

<article
    {{ $attributes->merge(['class' => 'transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl']) }}>
    <div class="py-6 px-5">
        <div>
            <img src="{{ asset($post->image) }}" alt="Blog Post illustration"
                 class="rounded-xl">
        </div>

        <div class="mt-8 flex flex-col justify-between items-center">
            <header>

                <div class="mb-4">
                    <h1>
                        {{ Str::limit($post->title, $loop > 2 ? 40 : 60) }}
                    </h1>


                </div>

                <div class="space-x-2 flex justify-between">
                    <x-category-button :category="$post->category"/>
                    <div class="leading-6 text-gray-400 text-xs">
                        Published
                        <time>{{ $post->published_at->diffForHumans() }}</time>
                    </div>
                </div>
            </header>

            <div class="text-sm mt-4 text-center">
                <p>{{ Str::limit($post->body, 180) }}</p>
            </div>

            <footer class="mt-8">
                <a href="{{ route('author-posts', $post->author->username) }}">
                    <div class="flex items-center text-sm">
                        <img src="{{ $post->author->image }}" alt="Lary avatar" class="h-11 rounded w-11">
                        <div class="ml-3">
                            <h5 class="font-bold">{{ $post->author->name }}</h5>
                        </div>
                    </div>
                </a>


                <div class="mt-8 text-center">
                    <a href="{{ route('posts.show', $post->slug) }}"
                       class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8"
                    >Read More</a>
                </div>
            </footer>
        </div>
    </div>
</article>

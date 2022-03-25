@extends('layouts.app')

@section('content')
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if($posts->count())

            <x-featured-post :post="$posts[0]"/>

            @if($posts->count() > 1)
                <div class="lg:grid lg:grid-cols-6">
                    @foreach($posts->skip(1) as $post)
                        <x-post :post="$post" :loop="$loop->iteration"
                                class="{{ $loop->iteration < 3 ? 'col-span-3' : 'col-span-2' }}"/>
                    @endforeach
                </div>
            @endif
        @else
            <h2 class="text-4xl text-center">Unfortunately, there are no posts in this category</h2>
        @endif
    </main>
@endsection


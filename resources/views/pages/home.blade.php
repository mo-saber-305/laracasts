@extends('layouts.frontend')

@section('style')
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
@endsection

@section('content')
    <header class="max-w-xl mx-auto mt-20 text-center">
        <h1 class="text-4xl">
            Latest <span class="text-blue-500">Laravel From Scratch</span> News
        </h1>

        <h2 class="inline-flex mt-2">By Mo Saber <img src="{{ asset('images/lary-head.svg') }}"
                                                      alt="Head of Lary the mascot"></h2>

        <p class="text-sm mt-14">
            Another year. Another update. We're refreshing the popular Laravel series with new content.
            I'm going to keep you guys up to speed with what's going on!
        </p>
        <div class="mt-8">
            <form action="{{ route('home') }}" method="get" id="filterForm">
                <!--  Category -->
                <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl">
                    <x-category-select/>

                    <svg class="transform -rotate-90 absolute pointer-events-none" style="right: 12px;" width="22"
                         height="22" viewBox="0 0 22 22">
                        <g fill="none" fill-rule="evenodd">
                            <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                            </path>
                            <path fill="#222"
                                  d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
                        </g>
                    </svg>
                </div>

                <!-- Other Filters -->
                <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl lg:ml-3  mt-4 lg:mt-0 ">
                    <x-author-select/>

                    <svg class="transform -rotate-90 absolute pointer-events-none" style="right: 12px;" width="22"
                         height="22" viewBox="0 0 22 22">
                        <g fill="none" fill-rule="evenodd">
                            <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                            </path>
                            <path fill="#222"
                                  d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
                        </g>
                    </svg>
                </div>
            </form>


            <!-- Search -->
            <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2 mt-4">
                <form method="GET" action="{{ route('home') }}">
                    <input type="text" name="search" placeholder="Search For Posts" value="{{ request()->search }}"
                           class="bg-transparent placeholder-black font-semibold text-sm">
                </form>
            </div>
        </div>
    </header>

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

            {{ $posts->links('pagination::tailwind') }}
        @else
            <h2 class="text-4xl text-center">Unfortunately, there are no posts in this category</h2>
        @endif
    </main>
@endsection

@section('script')
    <script>
        $(function () {
            $(document).on('change', '#selectCategory, #selectAuthor', function () {
                $('#filterForm').submit();
            })
        })
    </script>


@endsection

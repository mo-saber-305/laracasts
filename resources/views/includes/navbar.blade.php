<nav class="md:flex md:justify-between md:items-center">
    <div>
        <a href="/">
            <img src="{{ asset('images/logo.svg') }}" alt="Laracasts Logo" width="165" height="16">
        </a>
    </div>

    <div class="inline-flex items-center md:mt-0 mt-8">
        @auth
            <div class="relative">
                <input type="checkbox" id="sortbox" class="hidden absolute">
                <label for="sortbox" class="flex items-center space-x-1 cursor-pointer">
                    <img src="{{ auth()->user()->image }}" alt="{{ auth()->user()->name }}"
                         class="mr-2 rounded-full w-12">
                    <span class="text-lg">{{ auth()->user()->name }}</span>
                    <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </label>

                <div id="sortboxmenu"
                     class="absolute mt-1 left-1/4 top-full min-w-max shadow rounded opacity-0 bg-gray-50 border border-gray-400 transition delay-75 ease-in-out z-10">
                    <ul class="block text-center text-gray-900">
                        <li>
                            <a href="{{ route('author-posts', auth()->user()->username) }}"
                               class="block px-3 py-2 hover:bg-blue-600 hover:text-white">my posts</a>
                        </li>
                        <li>
                            <a href="{{ route('posts.create') }}"
                               class="block px-3 py-2 hover:bg-blue-600 hover:text-white">create new post</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="block px-3 py-2 hover:bg-blue-600 hover:text-white"
                               onclick="event.preventDefault(); $('#logoutForm').submit()">logout</a>

                            <form action="{{ route('logout') }}" method="post" id="logoutForm" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        @else
            <a href="{{ route('register') }}" class="font-bold">register</a>

            <a href="{{ route('login') }}" class="font-bold ml-3">login</a>
        @endauth

        <a href="#newsletter"
           class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
            Subscribe for Updates
        </a>
    </div>
</nav>

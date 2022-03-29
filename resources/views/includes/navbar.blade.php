<nav class="md:flex md:justify-between md:items-center">
    <div>
        <a href="/">
            <img src="{{ asset('images/logo.svg') }}" alt="Laracasts Logo" width="165" height="16">
        </a>
    </div>

    <div class="inline-flex items-center md:mt-0 mt-8">
        @auth
            <a href="{{ route('dashboard') }}" class="font-bold inline-flex items-center">
                <img src="{{ auth()->user()->image }}" alt="{{ auth()->user()->name }}" class="mr-2 rounded-full w-12">
                {{ auth()->user()->name }}
            </a>
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

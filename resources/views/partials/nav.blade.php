<div id="app" class="bg-black sm:flex sm:justify-between sm:items-center sm:px-4 sm:py-3">
    <div class="flex items-center justify-between px-4 py-3 sm:p-0">
        <div class="flex text-left flex-no-shrink mr-0">
            <a class="flex text-base font-semibold no-underline hover:text-mstore hover:no-underline" href="/">
                <span class=" text-white text-center text-xl  font-extrabold">MStore</span>
            </a>

        </div>

        <div class="block sm:hidden">
            <button class="navbar-burger block text-blue hover:text-white focus:text-white focus:outline-none">
                <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24">
                <path  fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"/>
                </svg>
            </button>
        </div>
    </div>
    <nav id="main-nav" class="sm:block sm:w-auto hidden">
        <div class="px-2 pt-2 pb-4 sm:flex sm:p-0">
            <a href="/" class="block px-2 py-1 text-white font-semibold rounded hover:bg-blue">Home</a>
            <a href="#" class="mt-1 block px-2 py-1 text-white font-semibold rounded hover:bg-blue sm:mt-0 sm:ml-2">Services</a>
            <a href="/blog" class="mt-1 block px-2 py-1 text-white font-semibold rounded hover:bg-blue sm:mt-0 sm:ml-2">Blog</a>
            <a href="/contact" class="mt-1 block px-2 py-1 text-white font-semibold rounded hover:bg-blue sm:mt-0 sm:ml-2">Contact Us</a>
            @auth
            <div class="relative group hidden sm:block sm:ml-6">
                <div class="flex items-center cursor-pointer text-base text-grey-dark  group-hover:border-mstore hover:text-mstore  mt-1 px-6 mb-0 sm:mt-0">
                    <img class="h-8 w-8 border-2 border-gray-600 rounded-full object-cover" src="{{ Storage::url(Auth::user()->avatar) }}"
                        alt="">
                    <span class="ml-3 font-semibold text-white">{{ Auth::user()->name }}</span>
                </div>

                <div class="absolute right-0 mt-0 py-2 w-48 bg-white rounded-lg shadow-xl invisible group-hover:visible">
                    <a href="{{ route('home') }}"
                        class="no-underline px-4 py-2 block text-grey-darker hover:bg-grey-lighter">
                        {{ __('Dashboard') }}

                    </a>
                    <a href="{{ route('show-profile') }}"
                        class="no-underline px-4 py-2 block text-grey-darker hover:bg-grey-lighter">
                        {{ __('auth.Profile') }}

                    </a>
                    <a href="{{ route('settings') }}"
                        class="no-underline px-4 py-2 block text-grey-darker hover:bg-grey-lighter">
                        {{ __('auth.Account Setting') }}

                    </a>

                    <hr class="border-t mx-2 border-grey-ligght">
                    <a href="{{ route('logout') }}"
                        class=" no-underline px-4 py-2 block text-grey-darker hover:bg-grey-lighter" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}

                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
            @else
                <a href="{{ route('login') }}"
                class="mt-1 block px-2 py-1 text-white bg-blue font-semibold rounded hover:bg-blue sm:mt-0 sm:ml-2">{{ __('auth.Login') }}</a>

            @endauth
        </div>
            @auth
            <div class="px-4 py-5 border-t border-gray-800 sm:hidden">
                <div class="flex items-center">
                    <img class="h-8 w-8 border-2 border-gray-600 rounded-full object-cover" src="{{ Storage::url(Auth::user()->avatar) }}" alt="">
                    <span class="ml-3 font-semibold text-white">{{ Auth::user()->name }}</span>
                </div>
                <div class="mt-4">
                    <a href="{{ route('home') }}" class="block text-white hover:text-blue">{{ __('Dashboard') }}</a>
                    <a href="{{ route('show-profile') }}" class="mt-2 block text-white hover:text-blue">{{ __('auth.Profile') }}</a>
                    <a href="{{ route('settings') }}" class="mt-2 block text-white hover:text-blue">{{ __('auth.Account Setting') }}</a>
                    <a href="{{ route('logout') }}" class="mt-2 block text-white hover:text-blue"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
            @endauth
    </nav>
</div>



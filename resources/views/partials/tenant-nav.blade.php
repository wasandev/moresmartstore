<div class="font-sans antialiased" id="app">
    <nav class="flex justify-between flex-wrap bg-white  text-grey-darkest p-4 mt-0 w-full shadow-md">
      <div class="flex text-left flex-no-shrink mr-0">
        <a class="flex block text-base font-semibold no-underline hover:text-mstore hover:no-underline" href="/">
            <img class="w-10 h-10 rounded-full mr-4 mt-1" src="{{ Storage::url($company->logofile) }}" alt="">
            <div class="mt-4">
                {{ $company->company_name }}
            </div>
        </a>

      </div>

      <div class="block lg:hidden">
        <button @click="toggle" class="flex items-center px-3 py-2  text-grey-darkest hover:text-mstore ">
          <svg class="fill-current h-5 w-5" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
        </button>
      </div>

      <div :class="open ? 'block': 'hidden'" class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
            <div class="text-xl lg:flex-grow text-center">
                <a href="#responsive-header" class="block mt-2 lg:inline-block lg:mt-0 text-gray-darkest hover:text-mstore mr-4">
                    Service
                </a>
                <a href="#responsive-header" class="block mt-2 lg:inline-block lg:mt-0 text-gray-darkest hover:text-mstore mr-4">
                    Blog
                </a>
                <a href="#responsive-header" class="block mt-2 lg:inline-block lg:mt-0 text-gray-darkest hover:text-mstore mr-4">
                    Contact US
                </a>
            </div>


            <div>

            @auth
              <div class="relative group">
                <div class="flex items-center cursor-pointer text-lg text-grey-darkest  group-hover:border-mstore hover:text-mstore  mt-1 px-6 mb-0 sm:mt-0">

                  <img class="w-8 h-8 rounded-full mr-4 mt-1" src="{{ Storage::url(Auth::user()->avatar) }}" alt="">

                          {{ Auth::user()->name }}
                </div>

                <div class=" w-full tems-center absolute border border-t-0 rounded-b-lg  bg-white p-1 invisible group-hover:visible w-full">

                  <a href="{{ route('show-profile') }}"
                      class="no-underline px-4 py-2 block text-grey-darkest hover:bg-grey-lighter">
                      {{ __('auth.Profile') }}

                  </a>
                  <a href="{{ route('settings') }}"
                      class="no-underline px-4 py-2 block text-grey-darkest hover:bg-grey-lighter">
                      {{ __('auth.Account Setting') }}

                  </a>

                  <hr class="border-t mx-2 border-grey-ligght">
                  <a href="{{ route('logout') }}" class=" no-underline px-4 py-2 block text-grey-darkest hover:bg-grey-lighter"
                        onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}

                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
                </div>
              </div>



            @else

                <a href="/app" class="no-underline inline-block text-base font-semibold px-4 py-2 leading-none text-grey-darkest rounded hover:text-white hover:bg-mstore  mt-4 sm:mt-0">

                    {{ __('auth.Login') }}
                </a>


            @endauth

        </div>

      </div>

    </nav>
  </div>




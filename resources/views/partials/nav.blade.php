<div class="bg-white shadow-md lg:flex lg:justify-between lg:items-center lg:px-4 lg:py-3  fixed top-0 inset-x-0 z-50 ">

        <div class="flex items-center justify-between  px-4 py-3 lg:p-0">
            <div class="flex text-left flex-no-shrink mr-0">
                <a class="flex text-base  no-underline hover:text-mstore hover:no-underline" href="/">
                    @include('partials.logo')
                </a>

            </div>
            <div class="lg:ml-16">
                @auth
                    <div id="notifications" class="block relative group">
                        <div  class="cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="fill-current " viewBox="0 0 20 20" width="20" height="20">
                                <path d="M4 8a6 6 0 0 1 4.03-5.67 2 2 0 1 1 3.95 0A6 6 0 0 1 16 8v6l3 2v1H1v-1l3-2V8zm8 10a2 2 0 1 1-4 0h4z"/>
                            </svg>
                        </div>
                        <div id="notificationsMenu" class="w-32 absolute  mt-0 p-2 bg-white rounded-lg shadow-xl invisible group-hover:visible">
                            <p class="text-sm">ไม่มีข้อความแจ้งเตือน</p>
                        </div>
                    </div>
                @endauth
            </div>

            <div class="block lg:hidden ">
                <button class="navbar-burger block  text-blue-500 hover:text-red-500 focus:text-gray-800 focus:outline-none">
                    <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24">
                    <path  fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"/>
                    </svg>
                </button>
            </div>

        </div>



        <div id="main-nav" class="lg:block lg:w-auto hidden text-base font-medium">
            <div class="px-2 pt-2 pb-4 lg:flex lg:p-0">
                <a href="/" class="block px-2 py-1 text-gray-800  rounded hover:bg-blue-700 hover:text-gray-100">หน้าหลัก</a>
                <a href="/vendors" class="mt-1 block px-2 py-1 text-gray-800  rounded hover:bg-blue-700 hover:text-gray-100 lg:mt-0 lg:ml-2  ">ข้อมูลธุรกิจ</a>
                <a href="/products" class="mt-1 block px-2 py-1 text-gray-800  rounded hover:bg-blue-700 hover:text-gray-100 lg:mt-0 lg:ml-2  ">สินค้า</a>
                <a href="/post" class="mt-1 block px-2 py-1 text-gray-800  rounded hover:bg-blue-700 hover:text-gray-100 lg:mt-0 lg:ml-2  ">โพส</a>
                <a href="/blogs" class="mt-1 block px-2 py-1 text-gray-800  rounded hover:bg-blue-700 hover:text-gray-100 lg:mt-0 lg:ml-2  ">บทความ</a>

                @auth

                    <div class="relative group hidden lg:block lg:ml-6">

                        <div  class="flex items-center cursor-pointer  text-gray-800  group-hover: border-gray  hover:text-blue  mt-1 px-6 mb-0 lg:mt-0">
                            <img class="h-8 w-8 border-2 border-grey-light rounded-full object-cover" src="{{ Storage::url(Auth::user()->avatar) }}"
                                alt="">
                            <span class="ml-3  text-gray-800 hover:text-yellow-700">{{ Auth::user()->name }}</span>
                        </div>

                        <div class="w-full absolute right-0 mt-0 py-2 bg-white rounded-lg shadow-xl invisible group-hover:visible">
                            <a href="/home"
                                class="no-underline px-4 py-2 block text-grey-900 hover:text-blue-500">
                                หน้าธุรกิจของคุณ
                            </a>

                            <hr class="border-t mx-2 border-gray-light">
                            <a href="{{ route('logout') }}"
                                class=" no-underline px-4 py-2 block text-grey-900 hover:text-blue-500" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}

                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                    </div>


                @else
                    <a href="{{ route('login') }}"
                        class="mt-1 block px-2 py-1 text-gray-100 bg-blue-500 rounded hover:bg-red-600 hover:text-gray-100 lg:mt-0 lg:ml-2 ">
                        Login
                    </a>
                @endauth

                </div>
            </div>
            @auth
                <div class="px-4 py-5 border-t border-gray-800 lg:hidden">

                    <div  class="flex items-center">
                        <img class="h-8 w-8 border-2 border-gray-600 rounded-full object-cover" src="{{ Storage::url(Auth::user()->avatar) }}" alt="">
                        <span class="ml-3 text-sm text-gray-800">{{ Auth::user()->name }}</span>
                    </div>
                    <div class="mt-4">

                        <a href="/home" class="px-2 py-1 mt-2 block text-gray-800  rounded hover:bg-blue-700 hover:text-gray-100 lg:mt-0 lg:ml-2">หน้าธุรกิจของคุณ</a>
                        <a href="{{ route('logout') }}" class="px-2 py-1 mt-2 block text-gray-800 rounded hover:bg-blue-700 hover:text-gray-100 lg:mt-0 lg:ml-2"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form1" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>



                </div>
            @endauth

        </div>

</div>



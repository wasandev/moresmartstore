<div class="bg-white shadow-md lg:flex lg:justify-between lg:items-center lg:px-4 lg:py-2  fixed top-0 inset-x-0 z-50 ">

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
                            <svg xmlns="http://www.w3.org/2000/svg" class="fill-current  " viewBox="0 0 20 20" width="20" height="20">
                                <path d="M4 8a6 6 0 0 1 4.03-5.67 2 2 0 1 1 3.95 0A6 6 0 0 1 16 8v6l3 2v1H1v-1l3-2V8zm8 10a2 2 0 1 1-4 0h4z"/>
                            </svg>

                        </div>
                        <div id="notificationsMenu" class=" w-64 absolute  mt-0 p-2 bg-white rounded-lg shadow-xl invisible group-hover:visible">
                            <p class="text-sm text-gray-700">ไม่มีข้อความแจ้งเตือน</p>
                        </div>

                    </div>
                @endauth
            </div>

            <div class="block lg:hidden ">
                <button class="navbar-burger block  text-blue-500 hover:text-red-500 focus:text-gray-800 focus:outline-none">
                    <svg class="h-6 w-6 fill-current absolute" viewBox="0 0 24 24">
                    <path  fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"/>
                    </svg>
                    <span class="ml-6">MENU</span>
                </button>
            </div>

        </div>



        <div id="main-nav" class="lg:block lg:w-auto hidden text-base font-medium lg:bg-white bg-gray-200 text-center">
            <div class="lg:flex lg:justify-between items-center">
                <a href="/" class="mx-4 block px-4 py-1 text-gray-800 mt-2 lg:mt-0 rounded-full border  border-gray-200 hover:bg-blue-500 hover:text-gray-100">
                    {{-- <svg xmlns="http://www.w3.org/2000/svg" class="fill-current absolute mr-4"  width="20" height="20" viewBox="0 0 20 20"><path d="M8 20H3V10H0L10 0l10 10h-3v10h-5v-6H8v6z"/>
                    </svg> --}}
                    <span>หน้าหลัก</span>
                </a>
                <a href="/vendors" class="mx-4 block px-4 py-1 text-gray-800 mt-2 lg:mt-0 rounded-full border border-gray-200 hover:bg-blue-500 hover:text-gray-100  ">
                    {{-- <svg xmlns="http://www.w3.org/2000/svg" class="fill-current absolute mr-4"  width="20" height="20" viewBox="0 0 20 20"><path d="M2 2c0-1.1.9-2 2-2h12a2 2 0 0 1 2 2v18l-8-4-8 4V2z"/>
                    </svg> --}}
                    <span>ข้อมูลธุรกิจ</span>
                </a>
                <a href="/products" class="mx-4 block px-4 py-1 text-gray-800 mt-2 lg:mt-0 rounded-full border border-gray-200 hover:bg-blue-500 hover:text-gray-100 ">
                    {{-- <svg xmlns="http://www.w3.org/2000/svg" class="fill-current absolute mr-4"  width="24" height="24" viewBox="0 0 24 24"><path class="heroicon-ui" d="M5 3h4a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5c0-1.1.9-2 2-2zm0 2v4h4V5H5zm10-2h4a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2h-4a2 2 0 0 1-2-2V5c0-1.1.9-2 2-2zm0 2v4h4V5h-4zM5 13h4a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4c0-1.1.9-2 2-2zm0 2v4h4v-4H5zm10-2h4a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2h-4a2 2 0 0 1-2-2v-4c0-1.1.9-2 2-2zm0 2v4h4v-4h-4z"/>
                    </svg> --}}
                    <span>สินค้า/บริการ</span>
                </a>
                <a href="/post" class="mx-4 block px-4 py-1 text-gray-800 mt-2 lg:mt-0 rounded-full border border-gray-200 hover:bg-blue-500 hover:text-gray-100 ">
                    {{-- <svg xmlns="http://www.w3.org/2000/svg" class="fill-current absolute mr-4"  width="24" height="24" viewBox="0 0 24 24"><path class="heroicon-ui" d="M6.3 12.3l10-10a1 1 0 0 1 1.4 0l4 4a1 1 0 0 1 0 1.4l-10 10a1 1 0 0 1-.7.3H7a1 1 0 0 1-1-1v-4a1 1 0 0 1 .3-.7zM8 16h2.59l9-9L17 4.41l-9 9V16zm10-2a1 1 0 0 1 2 0v6a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6c0-1.1.9-2 2-2h6a1 1 0 0 1 0 2H4v14h14v-6z"/>
                    </svg> --}}
                    <span>โพส</span>
                </a>
                <a href="/blogs" class="mx-4 block px-4 py-1 text-gray-800 mt-2 lg:mt-0 rounded-full border border-gray-200 hover:bg-blue-500 hover:text-gray-100  ">
                    {{-- <svg xmlns="http://www.w3.org/2000/svg" class="fill-current absolute mr-4"  width="20" height="20" viewBox="0 0 20 20"><path d="M16 2h4v15a3 3 0 0 1-3 3H3a3 3 0 0 1-3-3V0h16v2zm0 2v13a1 1 0 0 0 1 1 1 1 0 0 0 1-1V4h-2zM2 2v15a1 1 0 0 0 1 1h11.17a2.98 2.98 0 0 1-.17-1V2H2zm2 8h8v2H4v-2zm0 4h8v2H4v-2zM4 4h8v4H4V4z"/>
                    </svg> --}}
                    <span>บทความ</span>
                </a>

                <a href="/pages" class="mx-4 px-4 py-1 block text-green-500 mt-2 lg:mt-0 rounded-full border border-gray-500 hover:bg-blue-500 hover:text-gray-100  ">
                    <span>รู้จัก mStore</span>
                </a>
                @auth

                    <div class="relative group hidden lg:block lg:ml-6">

                        <div  class="flex items-center cursor-pointer  text-gray-800  group-hover: border-gray  hover:text-blue">
                            <img class="h-8 w-8 border-2 border-grey-light rounded-full object-cover" src="{{ Storage::url(Auth::user()->avatar) }}"
                                alt="">
                            <span class="ml-3 mt-1 px-4 py-1 rounded-full text-red-500 hover:bg-red-500 hover:text-gray-100 border-2 border-red-500">{{ Auth::user()->name }}</span>
                        </div>

                        <div class="w-48 absolute right-0 mt-0 py-1 bg-white rounded-lg shadow-xl invisible group-hover:visible">
                            <a href="/home"
                                class="no-underline px-4 py-1 block text-grey-900 hover:text-blue-500">

                                <svg xmlns="http://www.w3.org/2000/svg" class="fill-current absolute mr-4"  width="20" height="20" viewBox="0 0 20 20"><path d="M18 9.87V20H2V9.87a4.25 4.25 0 0 0 3-.38V14h10V9.5a4.26 4.26 0 0 0 3 .37zM3 0h4l-.67 6.03A3.43 3.43 0 0 1 3 9C1.34 9 .42 7.73.95 6.15L3 0zm5 0h4l.7 6.3c.17 1.5-.91 2.7-2.42 2.7h-.56A2.38 2.38 0 0 1 7.3 6.3L8 0zm5 0h4l2.05 6.15C19.58 7.73 18.65 9 17 9a3.42 3.42 0 0 1-3.33-2.97L13 0z"/></svg>
                                <span class="ml-6">จัดการข้อมูลธุรกิจ</span>
                            </a>
                            <hr class="border-t mx-2 border-gray-300" >
                            <a href="{{ url('/messages') }}" class="no-underline px-4 py-1 block text-grey-900 hover:text-blue-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="fill-current absolute mr-4"  width="20" height="20" viewBox="0 0 20 20"><path d="M0 2C0 .9.9 0 2 0h16a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm14 12h4V2H2v12h4c0 1.1.9 2 2 2h4a2 2 0 0 0 2-2z"/></svg>
                                <span class="ml-6">กล่องข้อความ @include('messenger.unread-count')</span>
                            </a>
                            <hr class="border-t mx-2 border-gray-300">

                            <a href="{{ route('logout') }}"
                                class=" no-underline px-4 py-1 block text-gray-900 hover:text-blue-500" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="fill-current absolute mr-4"  width="24" height="24" viewBox="0 0 24 24"><path d="M10 7H2v6h8v5l8-8-8-8v5z"/></svg>

                                  <span class="ml-6 text-red-500">{{ __('Logout') }}</span>

                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                    </div>


                @else
                    <a href="{{ route('login') }}"
                        class="mx-4 block px-4 py-1 text-red-600 border-2 border-red-500 rounded-full hover:bg-red-500 hover:text-gray-100">
                        {{-- <svg xmlns="http://www.w3.org/2000/svg" class="fill-current absolute mr-4"  width="20" height="20" viewBox="0 0 20 20"><path d="M5 5a5 5 0 0 1 10 0v2A5 5 0 0 1 5 7V5zM0 16.68A19.9 19.9 0 0 1 10 14c3.64 0 7.06.97 10 2.68V20H0v-3.32z"/></svg> --}}

                        <span>{{ __('Login') }}</span>
                    </a>
                @endauth

                </div>
            </div>
            @auth
                <div class="px-4 py-1 lg:hidden bg-blue-200 mt-2">
                    <div  class="w-full text-center">
                        <img class="h-12 w-12 border-2 border-gray-600 rounded-full object-cover mx-auto" src="{{ Storage::url(Auth::user()->avatar) }}" alt="">
                        <span class="text-base text-gray-800">{{ Auth::user()->name }}</span>
                    </div>
                    <div class="mt-4">
                        <a href="/home" class="px-2 py-1 mt-2 block text-gray-800  rounded-full hover:bg-blue-500 hover:text-gray-100 lg:mt-0 lg:ml-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="fill-current absolute mr-4"  width="20" height="20" viewBox="0 0 20 20"><path d="M18 9.87V20H2V9.87a4.25 4.25 0 0 0 3-.38V14h10V9.5a4.26 4.26 0 0 0 3 .37zM3 0h4l-.67 6.03A3.43 3.43 0 0 1 3 9C1.34 9 .42 7.73.95 6.15L3 0zm5 0h4l.7 6.3c.17 1.5-.91 2.7-2.42 2.7h-.56A2.38 2.38 0 0 1 7.3 6.3L8 0zm5 0h4l2.05 6.15C19.58 7.73 18.65 9 17 9a3.42 3.42 0 0 1-3.33-2.97L13 0z"/></svg>
                            <span class="ml-6">จัดการข้อมูลธุรกิจ</span>
                        </a>
                        <hr class="border-t mx-2 border-gray-300">
                        <a href="{{ url('/messages') }}" class="no-underline px-2 py-1 mt-2 block text-grey-900 hover:text-blue-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="fill-current absolute mr-4"  width="20" height="20" viewBox="0 0 20 20"><path d="M0 2C0 .9.9 0 2 0h16a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm14 12h4V2H2v12h4c0 1.1.9 2 2 2h4a2 2 0 0 0 2-2z"/></svg>
                            <span class="ml-6">กล่องข้อความ @include('messenger.unread-count')</span>
                        </a>
                        <hr class="border-t mx-2 border-gray-300">

                        <a href="{{ route('logout') }}" class="px-2 py-1 mt-2 block text-gray-800 rounded-full hover:bg-red-500 hover:text-gray-100 lg:mt-0 lg:ml-2"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                             <svg xmlns="http://www.w3.org/2000/svg" class="fill-current absolute mr-4"  width="20" height="20" viewBox="0 0 20 20"><path d="M10 7H2v6h8v5l8-8-8-8v5z"/></svg>

                             <span class="ml-6 ">{{ __('Logout') }}</span>
                        </a>
                        <form id="logout-form1" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            @endauth
        </div>
</div>



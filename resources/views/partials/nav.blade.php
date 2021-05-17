<div class=" bg-white  lg:flex lg:justify-between lg:items-center lg:px-4 lg:py-2 shadow fixed top-0 inset-x-0 z-50 ">

        <div class="flex items-center justify-between px-4 py-3 lg:p-0">
            <div class="flex text-left flex-no-shrink mr-0">
                <a class="flex text-base  no-underline hover:text-mstore hover:no-underline" href="/">
                    @include('partials.logo')
                </a>

            </div>
            {{-- <div class="lg:ml-16">
                @auth
                    <div id="notifications" class="block relative group">
                        <div  class="cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="fill-current  " viewBox="0 0 20 20" width="20" height="20">
                                <path d="M4 8a6 6 0 0 1 4.03-5.67 2 2 0 1 1 3.95 0A6 6 0 0 1 16 8v6l3 2v1H1v-1l3-2V8zm8 10a2 2 0 1 1-4 0h4z"/>
                            </svg>

                        </div>
                        <div id="notificationsMenu" class=" w-64 absolute  mt-0 p-2 bg-white rounded-lg shadow-xl invisible group-hover:visible">
                            <p class="text-base text-gray-700">ไม่มีข้อความแจ้งเตือน</p>
                        </div>

                    </div>
                @endauth

            </div> --}}
            <div class="lg:ml-16">
                @if((new \Jenssegers\Agent\Agent())->isDesktop())
                    <a href="https://www.facebook.com/moresmartstore" target="_blank"
                class="text-blue-500 hover:text-blue-700">
                    <svg class=" h-8 w-8 fill-current" viewBox="0 0 24 24">
                    <path d="M17,1H3C1.9,1,1,1.9,1,3v14c0,1.101,0.9,2,2,2h7v-7H8V9.525h2V7.475c0-2.164,1.212-3.684,3.766-3.684l1.803,0.002v2.605
        h-1.197C13.378,6.398,13,7.144,13,7.836v1.69h2.568L15,12h-2v7h4c1.1,0,2-0.899,2-2V3C19,1.9,18.1,1,17,1z"/>
                    </svg>

                </a>
                @endif


                @if((new \Jenssegers\Agent\Agent())->isMobile() || (new \Jenssegers\Agent\Agent())->isTablet() )
                    @if((new \Jenssegers\Agent\Agent())->isAndroidOS())
                                <a href="fb://page/1434260050125109"
                                class="text-blue-500 hover:text-blue-700">
                                    <svg class=" h-8 w-8 fill-current" viewBox="0 0 24 24">
                                    <path d="M17,1H3C1.9,1,1,1.9,1,3v14c0,1.101,0.9,2,2,2h7v-7H8V9.525h2V7.475c0-2.164,1.212-3.684,3.766-3.684l1.803,0.002v2.605
                        h-1.197C13.378,6.398,13,7.144,13,7.836v1.69h2.568L15,12h-2v7h4c1.1,0,2-0.899,2-2V3C19,1.9,18.1,1,17,1z"/>
                                    </svg>

                                </a>
                    @endif
                    @if((new \Jenssegers\Agent\Agent())->isiOS())
                                <a href="fb://profile/1434260050125109"
                                class="text-blue-500 hover:text-blue-700">
                                    <svg class=" h-8 w-8 fill-current" viewBox="0 0 24 24">
                                    <path d="M17,1H3C1.9,1,1,1.9,1,3v14c0,1.101,0.9,2,2,2h7v-7H8V9.525h2V7.475c0-2.164,1.212-3.684,3.766-3.684l1.803,0.002v2.605
                        h-1.197C13.378,6.398,13,7.144,13,7.836v1.69h2.568L15,12h-2v7h4c1.1,0,2-0.899,2-2V3C19,1.9,18.1,1,17,1z"/>
                                    </svg>

                                </a>
                    @endif

                @endif

            </div>
            <div class="block lg:hidden ">
                <button class="block  text-blue-500 hover:text-red-500 focus:text-gray-800 focus:outline-none" type="button" onclick="openDropdown(event,'dropdown-id')">
                    <svg class="h-6 w-6 fill-current absolute" viewBox="0 0 24 24">
                    <path  fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"/>
                    </svg>
                    <span class="ml-6">MENU</span>
                </button>
                 <div class="hidden bg-white  text-base z-50 float-left py-2 list-none text-left rounded shadow-lg mb-1" style="min-width:12rem" id="dropdown-id">
                    <a href="/" class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap  bg-transparent text-gray-800">
                    หน้าหลัก
                    </a>
                    <a href="/vendors" class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap  bg-transparent text-gray-800">
                    ข้อมูลธุรกิจ
                    </a>
                    <a href="/products" class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap  bg-transparent text-gray-800">
                    สินค้า/บริการ
                    </a>
                    <a href="/post" class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap  bg-transparent text-gray-800">
                    โพส
                    </a>
                     <a href="/blogs" class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap  bg-transparent text-gray-800">
                    บทความ
                    </a>
                     <a href="/pages" class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap  bg-transparent text-gray-800">
                    About
                    </a>
                     @auth
                        <div class="h-0 my-2 border border-solid border-t-0 border-blueGray-800 opacity-25"></div>
                            <a href="/home" class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap  bg-transparent text-gray-800">
                            เพิ่มธุรกิจ
                            </a>
                        <div class="h-0 my-2 border border-solid border-t-0 border-blueGray-800 opacity-25"></div>
                        <a href="{{ route('logout') }}" class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap  bg-transparent text-gray-800"
                        onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                         @csrf
                        </form>
                    @else

                     <div class="h-0 my-2 border border-solid border-t-0 border-blueGray-800 opacity-25"></div>
                    <a href="{{ route('login') }}" class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap  bg-transparent text-gray-800">
                    Login
                    </a>
                    @endauth

                </div>
            </div>


        </div>



        <div id="main-nav" class="lg:block lg:w-auto hidden text-base  text-left">
            <div class="lg:flex lg:justify-between items-center ">
                <a href="/" class="mx-2 block px-3 py-1 text-gray-800 mt-2 lg:mt-0  hover:bg-blue-500 hover:text-gray-100">
                     <span>หน้าหลัก</span>
                </a>
                <a href="/vendors" class="mx-2 block px-3 py-1 text-gray-800 mt-2 lg:mt-0  hover:bg-blue-500 hover:text-gray-100  ">
                     <span>ข้อมูลธุรกิจ</span>
                </a>
                <a href="/products" class="mx-2 block px-3 py-1 text-gray-800 mt-2 lg:mt-0  hover:bg-blue-500 hover:text-gray-100 ">
                     <span>สินค้า/บริการ</span>
                </a>
                <a href="/post" class="mx-2 block px-3 py-1 text-gray-800 mt-2 lg:mt-0  hover:bg-blue-500 hover:text-gray-100 ">
                      <span>โพส</span>
                </a>
                <a href="/blogs" class="mx-2 block px-3 py-1 text-gray-800 mt-2 lg:mt-0  hover:bg-blue-500 hover:text-gray-100  ">
                      <span>ข่าว/บทความ</span>
                </a>

                <a href="/pages" class="mx-2 px-3 py-1 block text-gray-800 mt-2 lg:mt-0  hover:bg-blue-500 hover:text-gray-100  ">

                    <span class="font-semibold">About mStore</span>
                </a>
                @auth

                    <div class="relative group hidden lg:block lg:ml-6">

                        <div  class="flex items-center cursor-pointer  text-gray-800  group-hover: border-gray  hover:text-blue">
                            <img class="h-8 w-8 border border-gray-100 rounded-full object-cover" src="{{ Storage::url(Auth::user()->avatar) }}"
                                alt="">
                            <span class="ml-3 mt-1 px-3 py-1 rounded-full text-red-500 hover:bg-red-500 hover:text-gray-100 border border-red-500">{{ Auth::user()->name }}</span>
                        </div>

                        <div class="w-48 absolute right-0 mt-0 py-1 bg-white rounded-lg shadow-xl invisible group-hover:visible">
                            <a href="/app" target="_blank"
                                class="no-underline px-3 py-1 block text-grey-900 hover:text-blue-500">

                                <span class="ml-6">จัดการข้อมูลธุรกิจ</span>
                            </a>
                            {{--
                            <hr class="border-t mx-2 border-gray-300" >
                             <a href="{{ url('/messages') }}" class="no-underline px-3 py-1 block text-grey-900 hover:text-blue-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="fill-current absolute mr-2"  width="20" height="20" viewBox="0 0 24 24"><path d="M0 2C0 .9.9 0 2 0h16a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm14 12h4V2H2v12h4c0 1.1.9 2 2 2h4a2 2 0 0 0 2-2z"/></svg>
                                <span class="ml-6">กล่องข้อความ @include('messenger.unread-count')</span>
                            </a>
                            <hr class="border-t mx-2 border-gray-300" >
                            <a href="{{ url('/messages/create/1/แจ้งปัญหาการใช้งาน') }}" class="no-underline px-2 py-1 mt-2 block text-grey-900 hover:text-blue-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="fill-current absolute mr-2"  width="20" height="20" viewBox="0 0 24 24"><path class="heroicon-ui" d="M12 2a10 10 0 1 1 0 20 10 10 0 0 1 0-20zm0 2a8 8 0 1 0 0 16 8 8 0 0 0 0-16zm0 9a1 1 0 0 1-1-1V8a1 1 0 0 1 2 0v4a1 1 0 0 1-1 1zm0 4a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>
                                <span class="ml-6">แจ้งปัญหาการใช้งาน</span>
                            </a> --}}
                            <hr class="border-t mx-2 border-gray-300">

                            <a href="{{ route('logout') }}"
                                class=" no-underline px-3 py-1 block text-gray-900 hover:text-blue-500" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">

                                  <span class="ml-6 text-red-500">{{ __('Logout') }}</span>

                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                    </div>


                @else
                    <a href="{{ route('login') }}"
                        class="mx-2 block px-3 py-1 mt-2 lg:mt-0   mb-2 lg:mb-0 text-blue-600 border border-gray-200 rounded-full hover:bg-blue-500 hover:text-gray-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="fill-current absolute mr-2"  width="20" height="20" viewBox="0 0 24 24"><path d="M5 5a5 5 0 0 1 10 0v2A5 5 0 0 1 5 7V5zM0 16.68A19.9 19.9 0 0 1 10 14c3.64 0 7.06.97 10 2.68V20H0v-3.32z"/></svg>

                        <span class="ml-6">{{ __('Login') }}</span>
                    </a>
                @endauth

                </div>
            </div>

        </div>
</div>



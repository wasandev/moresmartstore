@extends('layouts.app')

@section('nav')
    @include('partials.nav')
@endsection

@section('search')

    @include('partials.search')
@endsection


@section('content')

<!--image-->
<div id="app" class="max-w-full mx-auto">
    <div class="m-2 p-2 lg:flex lg:flex-row flex-col  rounded-lg shadow-md bg-gray-400">
        <div class="lg:flex lg:flex-row lg:w-1/2 w-full mx-auto items-center">
            <div class="lg:mr-2">
                <img class="w-16 h-16 rounded-full lg:ml-2 mx-auto" src="{{  Storage::url(Auth::user()->avatar) }}" alt="{{Auth::user()->name }}">

            </div>
            <div class="text-center lg:text-left">
                <h1 class="text-xl font-semibold leading-tight mt-2">
                    สวัสดี {{ Auth::user()->name }} ,
                </h1>
                <p class="sm:block text-black text-sm">
                    เข้าร่วม : {{ formatDateThai(Auth::user()->created_at) }}
                </p>
                <p class="sm:block text-black text-base">
                    หน้าธุรกิจของคุณ สำหรับจัดการรายชื่อธุรกิจ,สินค้า
                </p>
            </div>
        </div>
        <div class="flex flex-col lg:flex-row  lg:w-1/2 w-full mx-auto items-center lg:justify-end text-sm">

            {{-- <div class="flex">
                <span class="tl-follower rounded-full text-center text-gray-100 bg-blue-500 p-2 m-1">ผู้ติดตาม : {{ Auth::user()->followers()->get()->count() }}</span>
            </div>
            <div class="flex">
                <span class= "rounded-full text-center text-gray-100 bg-blue-500 p-2 m-1">กำลังติดตาม : {{ Auth::user()->followings()->get()->count() }}</span>
            </div>
            <div class="flex">
                <a class="rounded text-center text-gray-100 bg-purple-500 hover:bg-purple-400  p-2 m-1 " href="{{ url('/messages') }}">
                    <span>กล่องข้อความ @include('messenger.unread-count')</span>
                </a>
            </div>
            <div class="flex">
                <a class="rounded text-center text-gray-100 bg-purple-500 hover:bg-blue-400  p-2 m-1" href="/messages/create/1/แจ้งปัญหาการใช้งาน" >
                    แจ้งปัญหาการใช้งาน
                </a>
            </div> --}}
            <div class="flex">
                <a class=" font-bold rounded text-center text-white bg-black hover:bg-blue-600  p-2 m-1" href="/app" target="_blank">
                    จัดการข้อมูลธุรกิจ
                </a>
            </div>


        </div>
    </div>


    <div class="max-w-full mx-auto">
        <div class="flex">
            <div class="w-full mb-8">
                {{-- รายชื่อธุรกิจของคุณ --}}
            {{--vendor --}}
                @include('partials.headbar',[
                    'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" class="fill-current absolute"><path d="M2 2c0-1.1.9-2 2-2h12a2 2 0 0 1 2 2v18l-8-4-8 4V2z"/></svg>',
                    'title' => 'ข้อมูลธุรกิจของคุณ',
                    'link' => '/app/resources/vendors',
                    'linktext' => 'จัดการข้อมูลธุรกิจ',
                    'target' =>'_blank'
                ])
                <div class="flex flex-wrap  w-full xl:mx-0 rounded-lg">

                @if (count($vendors) > 0  )
                    @include('vendors.card',[
                        'showimage' => 1
                    ])
                @else
                    <div class="w-full mx-2 flex flex-col h-32 text-center bg-white p-4 mt-2">
                        <p class="mt-10 text-gray-800 text-base">ไม่มีข้อมูลธุรกิจในระบบ </p>
                        <a  href="/app/resources/vendors" target="_blank">
                            <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-1 px-2 border border-blue-500 hover:border-transparent rounded">
                                เพิ่ม ธุรกิจ
                            </button>
                        </a>
                    </div>
                @endif

            </div>

                {{-- สินค้าของคุณ --}}
                @include('partials.headbar',[
                        'svg' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="fill-current absolute"><path class="heroicon-ui" d="M5 3h4a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5c0-1.1.9-2 2-2zm0 2v4h4V5H5zm10-2h4a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2h-4a2 2 0 0 1-2-2V5c0-1.1.9-2 2-2zm0 2v4h4V5h-4zM5 13h4a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4c0-1.1.9-2 2-2zm0 2v4h4v-4H5zm10-2h4a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2h-4a2 2 0 0 1-2-2v-4c0-1.1.9-2 2-2zm0 2v4h4v-4h-4z"/></svg>',
                        'title' => 'สินค้าของคุณ',
                        'link' => '/app/resources/products',
                        'linktext' => 'จัดการสินค้า',
                        'target' =>'_blank'

                    ])
                <div class="flex flex-wrap  w-full xl:mx-0 rounded-lg">

                        @if (count($products) > 0  )
                        @include('products.card',[
                            'showimage' => 1
                        ])
                        @else
                            <div class="w-full mx-2 flex flex-col h-32 text-center bg-white p-4 mt-2">
                                <p class="mt-10 text-gray-800 text-base ">ไม่มีสินค้าในระบบ</p>
                                <a href="/app/resources/products" target="_blank">
                                    <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-1 px-2 border border-blue-500 hover:border-transparent rounded">
                                        เพิ่ม สินค้า
                                    </button>
                                </a>
                            </div>
                        @endif

                </div>

                {{-- โพส --}}
                    @include('partials.headbar',[
                        'svg' => ' <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current absolute"><path class="heroicon-ui" d="M6.3 12.3l10-10a1 1 0 0 1 1.4 0l4 4a1 1 0 0 1 0 1.4l-10 10a1 1 0 0 1-.7.3H7a1 1 0 0 1-1-1v-4a1 1 0 0 1 .3-.7zM8 16h2.59l9-9L17 4.41l-9 9V16zm10-2a1 1 0 0 1 2 0v6a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6c0-1.1.9-2 2-2h6a1 1 0 0 1 0 2H4v14h14v-6z"/></svg>',
                        'title' => 'โพสของคุณ',
                        'link' => '/app/resources/posts',
                        'linktext' => 'จัดการโพส',
                        'target' => '_self'
                    ])

                    <div class="flex flex-wrap  w-full xl:mx-0 rounded-lg">
                        @if (count($posts) > 0  )
                            @include('posts.card',[
                                'showimage' => 1
                            ])
                        @else
                            <div class="w-full  mx-2 flex flex-col h-32 text-center bg-white p-4 mt-2">
                                <p class="mt-10 text-gray-800 text-base ">ไม่มีโพสในระบบ</p>
                                <a  href="/app/resources/products">
                                    <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-base hover:text-white py-1 px-2 border border-blue-500 hover:border-transparent rounded">
                                        เพิ่ม โพส
                                    </button>
                                </a>
                            </div>
                        @endif
                    </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
@include('partials.footer')
@endsection

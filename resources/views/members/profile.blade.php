@extends('layouts.app')

@section('nav')
    @include('partials.nav')
@endsection

@section('search')
    @include('partials.search')
@endsection


@section('content')
<!--image-->
<div id="app" class="max-w-2xl mx-auto mt-4 bg-gray-300 rounded-lg">
    <div class="p-4">

            <div class="flex flex-row w-full mx-auto p-2 md:p-2 t leading-normal">
                <div class="w-1/3">
                    <img class=" w-16 h-16 rounded-full ml-3" src="{{  Storage::url(Auth::user()->avatar) }}" alt="{{Auth::user()->name }}">

                    <h1 class="text-xl font-semibold leading-tight">
                     {{ $user->name }}
                    </h1>
                    <span class="sm:block text-blue-700 text-sm">
                        เข้าร่วม : {{ formatDateThai($user->created_at) }}
                    </span>
                </div>
                <div class="flex flex-col w-2/3 mt-6">
                        <div class="flex flex-col text-right">
                           <p>ผู้ติดตาม : <span class="tl-follower text-sm">{{ $user->followers()->get()->count() }}</span></p>
                            <p>กำลังติดตาม : <span class= "text-sm">{{ $user->followings()->get()->count() }}</span></p>

                        </div>
                        <div class="text-right">
                        @if( $user->id != auth()->user()->id)
                            <button class="action-follow  btn btn-blue" data-id="{{ $user->id }}">
                                <strong>
                                @if(auth()->user()->isFollowing($user))
                                    เลิกติดตาม
                                @else
                                    ติดตาม
                                @endif
                                </strong>
                            </button>
                        @endif
                        </div>
                </div>
            </div>

    </div>
</div>

<div class="max-w-2xl mx-auto">
    <div class="flex">
        <div class="w-full mb-8">
            {{-- รายชื่อธุรกิจของคุณ --}}
           {{--vendor --}}
            @include('partials.headbar',[
                'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" class="fill-current absolute"><path d="M2 2c0-1.1.9-2 2-2h12a2 2 0 0 1 2 2v18l-8-4-8 4V2z"/></svg>',
                'title' => 'รายชื่อธุรกิจของสมาชิก',
                'link' => '/vendors',
                'linktext' => 'ดูธุรกิจทั้งหมด',
                'target' =>'_self'
            ])
            <div class="flex flex-wrap  w-full xl:mx-0 rounded-lg">

            @if (count($vendors) > 0  )
                @include('vendors.card',[
                    'showimage' => 1
                ])
            @else
                <div class="w-full mx-2 flex flex-col h-32 text-center bg-white p-4">
                    <p class="mt-10 text-gray-800 text-base">ไม่มีข้อมูลธุรกิจในระบบ </p>

                </div>
            @endif

        </div>

            {{-- สินค้าของสมาชิก--}}
            @include('partials.headbar',[
                    'svg' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="fill-current absolute"><path class="heroicon-ui" d="M5 3h4a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5c0-1.1.9-2 2-2zm0 2v4h4V5H5zm10-2h4a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2h-4a2 2 0 0 1-2-2V5c0-1.1.9-2 2-2zm0 2v4h4V5h-4zM5 13h4a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4c0-1.1.9-2 2-2zm0 2v4h4v-4H5zm10-2h4a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2h-4a2 2 0 0 1-2-2v-4c0-1.1.9-2 2-2zm0 2v4h4v-4h-4z"/></svg>',
                    'title' => 'สินค้าของสมาชิก',
                    'link' => '/products',
                    'linktext' => 'สินค้าทั้งหมด',
                    'target' =>'_self'

                ])
            <div class="flex flex-wrap  w-full xl:mx-0 rounded-lg">

                    @if (count($products) > 0  )
                       @include('products.card',[
                        'showimage' => 1
                    ])
                    @else
                        <div class="w-full mx-2 flex flex-col h-32 text-center bg-white p-4">
                            <p class="mt-10 text-gray-800 text-base ">ไม่มีสินค้าในระบบ</p>

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
                    <div class="w-full  flex flex-col h-32 text-center bg-white">
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

@endsection

@section('footer')
@include('partials.footer')
@endsection

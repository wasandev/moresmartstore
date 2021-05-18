@extends('layouts.app')

@section('nav')
    @include('partials.nav')
@endsection

@section('search')
    @include('partials.search')
@endsection


@section('content')


<div  class="max-w-full mx-auto">
    <div class="flex ">
        {{-- vendor detail --}}
        <div class="w-full">


            <div class="w-full lg:max-w-full lg:flex mx-auto  p-2 rounded-lg">
                    @if($vendor->imagefile == '')
                         <div class="lg:w-1/2  items-center justify-center bg-white">
                            <img class="h-auto p-4 rounded-md" src="{{  Storage::url('store.jpg') }}" alt="{{$vendor->name}}">

                        </div>

                    @else
                        <div class="lg:w-1/2  items-center justify-center bg-white">
                            <img class="h-auto p-4 rounded-md" src="{{  Storage::url($vendor->imagefile) }}" alt="{{$vendor->name}}">
                        </div>
                    @endif
                    <div class="lg:w-1/2 bg-white rounded-b flex  justify-between leading-normal ">

                        <div class="mb-4 p-2">
                            <div class="flex flex-row ">
                                    @if(!@empty($vendor->logofile))
                                        <img class="w-10 h-10 rounded-full mr-2" src="{{  Storage::url($vendor->logofile) }}" alt="{{ $vendor->name }}">
                                    @else
                                        <img class="w-10 h-10 rounded-full mr-2" src="{{  Storage::url('storelogo.png') }}" alt="{{ $vendor->name }}">
                                    @endif

                                    <h1 class="text-2xl text-gray-700"> {{ $vendor->name }} </h1>

                            </div>
                            <div class="">
                                <a href="/vendors/type/{{$vendor->businesstype_id}}" class="text-blue-500 hover:text-blue-700">
                                ประเภทธุรกิจ: {{$vendor->businesstype->name}}
                                </a>
                                <div class="items-center  text-gray-600 ">การดู : {{  $vendor->visits()->count() }} ครั้ง</div>

                            </div>
                            <p class="w-full bg-gray-100 py-2 mb-2 px-2 text-base text-gray-800 flex items-center rounded-lg mt-2">
                                 <span class=" text-base ml-2">
                                    {{$vendor->address}}  {{ $vendor->sub_district}} {{$vendor->district}}
                                    {{$vendor->province}}  {{ $vendor->postal_code}}
                                </span>

                            </p>
                            <div class="fb-share-button"
                                data-href="{{ $open_graph['url'] }}"
                                data-layout="box_count">
                            </div>

                            <div class="mt-4 lg:w-full w-full  text-gray-800 text-base text-left  ">
                                {!! $vendor->description !!}
                            </div>

                        </div>

                </div>

            </div>
            @if (!empty($vendor->location_lat) || !empty($vendor->location_lat  ))

                <div class="lg:w-1/2 w-full  bg-white text-center ">
                        @include('vendors.googlemap')
                    </div>

            @endif
            <div class="flex lg:flex-row flex-col  text-base font-semibold lg:justify-center text-center ">

                            @if(!empty($vendor->phoneno))

                                <a class="w-48 mx-auto m-1 text-center items-center rounded-full border border-blue-500 p-2 lg:mx-2 text-blue-500 hover:text-gray-100 hover:bg-blue-500" href="tel:{{ $vendor->phoneno }}" >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-current absolute mr-2" viewBox="0 0 24 24" width="24" height="24"><path class="heroicon-ui" d="M13.04 14.69l1.07-2.14a1 1 0 0 1 1.2-.5l6 2A1 1 0 0 1 22 15v5a2 2 0 0 1-2 2h-2A16 16 0 0 1 2 6V4c0-1.1.9-2 2-2h5a1 1 0 0 1 .95.68l2 6a1 1 0 0 1-.5 1.21L9.3 10.96a10.05 10.05 0 0 0 3.73 3.73zM8.28 4H4v2a14 14 0 0 0 14 14h2v-4.28l-4.5-1.5-1.12 2.26a1 1 0 0 1-1.3.46 12.04 12.04 0 0 1-6.02-6.01 1 1 0 0 1 .46-1.3l2.26-1.14L8.28 4zm7.43 5.7a1 1 0 1 1-1.42-1.4L18.6 4H16a1 1 0 0 1 0-2h5a1 1 0 0 1 1 1v5a1 1 0 0 1-2 0V5.41l-4.3 4.3z"/>
                                    </svg>
                                    <span class="ml-6">{{ $vendor->phoneno }}</span>
                                </a>

                            @endif

                            @if(!empty($vendor->weburl))
                                <a class="w-48 mx-auto m-1 items-center rounded-full border border-blue-500 p-2 lg:mx-2 text-blue-500 hover:text-gray-100 hover:bg-blue-500" href="{{ $vendor->weburl }}" target="_blank" >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-current absolute mr-2" viewBox="0 0 24 24" width="24" height="24"><path d="M8 20H3V10H0L10 0l10 10h-3v10h-5v-6H8v6z"/></svg>
                                    <span class="ml-6">เว็บไซต์</span>
                                </a>
                            @endif

                            @if(!empty($vendor->email))
                                <a class="w-48  mx-auto m-1 items-center rounded-full border border-blue-500 p-2 lg:mx-2 text-blue-500 hover:text-gray-100 hover:bg-blue-500" href="mailto:{{ $vendor->email }}" target="_blank" >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-current absolute mr-2" viewBox="0 0 24 24" width="24" height="24"><path class="heroicon-ui" d="M4 4h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6c0-1.1.9-2 2-2zm16 3.38V6H4v1.38l8 4 8-4zm0 2.24l-7.55 3.77a1 1 0 0 1-.9 0L4 9.62V18h16V9.62z"/></svg>
                                    <span class="ml-6">อีเมล</span>
                                </a>

                            @endif
                            @if(!empty($vendor->facebook))

                                <a class="w-48 mx-auto m-1 items-center rounded-full border border-blue-500 p-2 lg:mx-2 text-blue-500 hover:text-gray-100 hover:bg-blue-500" href="{{ $vendor->facebook}}" target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-current absolute mr-2" viewBox="0 0 24 24" width="24" height="24"><path d="M17,1H3C1.9,1,1,1.9,1,3v14c0,1.101,0.9,2,2,2h7v-7H8V9.525h2V7.475c0-2.164,1.212-3.684,3.766-3.684l1.803,0.002v2.605 h-1.197C13.378,6.398,13,7.144,13,7.836v1.69h2.568L15,12h-2v7h4c1.1,0,2-0.899,2-2V3C19,1.9,18.1,1,17,1z"/></svg>
                                    <span class="ml-6">Facebook</span>
                                </a>

                            @endif
                            @if(!empty($vendor->line))

                                @if (substr($vendor->line, 0, 1) == '@')
                                    <a class="w-48 mx-auto m-1 items-center rounded-full border border-blue-500 p-2 lg:mx-2 text-blue-500 hover:text-gray-100 hover:bg-blue-500" href="http://line.me/R/ti/p/{{ $vendor->line}}" target="_blank">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="fill-current absolute mr-2" viewBox="0 0 24 24" width="24" height="24"><path d="M10 15l-4 4v-4H2a2 2 0 0 1-2-2V3c0-1.1.9-2 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-8zM5 7v2h2V7H5zm4 0v2h2V7H9zm4 0v2h2V7h-2z"/></svg>
                                        <span class="ml-6">Line</span>
                                    </a>
                                @else
                                    <a class="w-48 mx-auto m-1 items-center rounded-full border border-blue-500 p-2 lg:mx-2 text-blue-500 hover:text-gray-100 hover:bg-blue-500" href="http://line.me/ti/p/~{{ $vendor->line}}" target="_blank">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="fill-current absolute mr-2" viewBox="0 0 24 24" width="24" height="24"><path d="M10 15l-4 4v-4H2a2 2 0 0 1-2-2V3c0-1.1.9-2 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-8zM5 7v2h2V7H5zm4 0v2h2V7H9zm4 0v2h2V7h-2z"/></svg>
                                        <span class="ml-6">Line</span>
                                    </a>
                                @endif

                            @endif

                        </div>
                        <div class="lg:flex lg:justify-between  p-4 lg:bg-gray-300">
                                <div class="flex flex-col items-center lg:w-1/2 w-full lg:flex lg:flex-row mx-auto">
                                    <img class=" lg:w-14 lg:h-14  w-16 h-16 rounded-full lg:mr-2" src="{{  Storage::url($vendor->user->avatar) }}" alt="{{ $vendor->user->name }}">
                                    <div class="text-sm lg:text-left text-center">
                                        <p class="text-gray-900 leading-none">สมาชิกผู้โพส : {{ $vendor->user->name }}</p>
                                        <p class="text-gray-900 leading-normal">เข้าร่วมเมื่อ : {{ formatDateThai($vendor->user->created_at) }}</p>
                                        <p class="text-gray-600 mb-2">จำนวนผู้ติดตาม : {{  $vendor->user->followers()->get()->count() }} </p>

                                    </div>

                                </div>
                                <div class="lg:w-1/2 w-full  text-center lg:text-right mt-4 text-sm m-2 items-center ">
                                    <a class="bg-blue-500 hover:bg-blue-700 p-2  shadow rounded-lg text-white"
                                        href="/profile/{{$vendor->user->id}}">
                                        ข้อมูลสมาชิก
                                    </a>
                                    @auth
                                        @if($vendor->user->id != auth()->user()->id)
                                        <a class=" ml-4 bg-purple-500 hover:bg-purple-400 p-2  shadow rounded-lg text-white"
                                href="/messages/create/{{$vendor->user->id}}/{{$vendor->name}}">
                                            ส่งข้อความ
                                        </a>
                                    @endif
                                    @endauth
                                </div>


                            </div>
            {{-- สินค้า list --}}
            @if (count($products) > 0)
                <div class="p-2">
                    @include('partials.headbar',[
                    'svg' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="fill-current absolute"><path class="heroicon-ui" d="M5 3h4a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5c0-1.1.9-2 2-2zm0 2v4h4V5H5zm10-2h4a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2h-4a2 2 0 0 1-2-2V5c0-1.1.9-2 2-2zm0 2v4h4V5h-4zM5 13h4a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4c0-1.1.9-2 2-2zm0 2v4h4v-4H5zm10-2h4a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2h-4a2 2 0 0 1-2-2v-4c0-1.1.9-2 2-2zm0 2v4h4v-4h-4z"/></svg>',
                    'title' => 'สินค้า/บริการ',
                    'link' => '/products',
                    'linktext' => 'แสดงทั้งหมด',
                    'target' => '_self'
                    ])
                    @include('products.card',[
                        'showimage' => 1
                    ])
                    <div class="w-full mx-auto p-4">
                    {{ $products->links('vendor.pagination.tailwind') }}
                    </div>
                </div>
            @endif
            {{-- โพส list --}}
            @if (count($posts) > 0)
                <div class="p-2">
                    @include('partials.headbar',[
                    'svg' => ' <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current absolute"><path class="heroicon-ui" d="M6.3 12.3l10-10a1 1 0 0 1 1.4 0l4 4a1 1 0 0 1 0 1.4l-10 10a1 1 0 0 1-.7.3H7a1 1 0 0 1-1-1v-4a1 1 0 0 1 .3-.7zM8 16h2.59l9-9L17 4.41l-9 9V16zm10-2a1 1 0 0 1 2 0v6a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6c0-1.1.9-2 2-2h6a1 1 0 0 1 0 2H4v14h14v-6z"/></svg>',
                    'title' => 'โพสโฆษณา',
                    'link' => '/post',
                    'linktext' => 'แสดงทั้งหมด',
                    'target' => '_self'
                    ])
                    @include('posts.card',[
                        'showimage' => 1
                    ])
                    <div class="w-full mx-auto p-4">
                    {{ $posts->links('vendor.pagination.tailwind') }}
                    </div>
                </div>
            @endif

        </div>


    </div>

</div>


@endsection
@section('ogmeta')
    <meta property="og:url" content="{{ $open_graph['url'] }}" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{ $open_graph['title'] }}" />
    <meta property="og:description" content="{{ $open_graph['description'] }}" />
    <meta property="og:image" content="{{ $open_graph['image'] }}" />
@endsection
@section('footer')
    @include('partials.footer')

@endsection

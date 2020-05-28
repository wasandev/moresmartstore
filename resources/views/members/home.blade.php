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

            <div class="w-full mx-auto p-2 md:p-2 t leading-normal ">
                <h1 class="text-2xl font-semibold leading-tight ">
                สวัสดี {{ Auth::user()->name }} ,
                </h1>
                <span class="sm:block text-blue-700 text-xl font-base">
                    นี่คือหน้าธุรกิจของคุณ สำหรับจัดการรายชื่อธุรกิจ,สินค้าและโพสโฆษณา
                </span>
            </div>

    </div>
</div>

<div class="max-w-2xl mx-auto">
    <div class="flex">
        <div class="w-full mb-8">
            {{-- รายชื่อธุรกิจของคุณ --}}
            <div class="mx-2">
                <div class="w-full mt-4 flex flex-row p-2  border-b-2 ">
                    <div class="text-base w-1/2 font-bold text-left text-blue-600 subpixel-antialiased">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" class="fill-current absolute"><path d="M2 2c0-1.1.9-2 2-2h12a2 2 0 0 1 2 2v18l-8-4-8 4V2z"/></svg>
                        <span class="pl-8 py-2">รายชื่อธุรกิจของคุณ</span>
                    </div>
                    <div class="text-base w-1/2 font-bold text-right  subpixel-antialiased">
                        <a class="px-2 py-1 mt-2  text-gray-100 bg-blue-500 hover:text-gray-200 hover:bg-blue-800 rounded" href="/app/resources/vendors" target="_blank">จัดการข้อมูลธุรกิจ</a>
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap  w-full xl:mx-0 rounded-lg">

                @if (count($vendors) > 0  )
                <div class="flex flex-wrap  w-full xl:mx-0 rounded-lg">
                    @foreach ($vendors as $vendor)
                    <div class="w-full flex flex-col md:w-1/2 lg:w-1/2 xl:w-1/2">
                        <a href="/vendor" class=" flex flex-col flex-1 rounded shadow hover:shadow-lg translateY-2px m-4 no-underline transition">
                            <div class="aspect-16x9 rounded-t-lg"
                                style="background:url('{{  Storage::url($vendor->imagefile) }}') no-repeat center center/cover">
                            </div>
                            <div class="p-2 flex flex-col flex-1 bg-white  rounded-b-lg subpixel-antialiased">
                                <p class="mb-2 text-grey-900 text-sm font-semibold text-left">{{ $vendor->name }} </p>
                                <div class="mb-3 w-full mx-auto text-left text-sm font-thin flex-1 ">
                                    <p> {{Str::of( $vendor->description)->limit(100) }} </p>
                                </div>
                                <div class="w-full  flex  flex-row border-t-2 text-sm font-thin ">

                                    <div class="text-left w-1/3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="fill-current absolute" viewBox="0 0 24 24" width="24" height="24"><path class="heroicon-ui" d="M17.56 17.66a8 8 0 0 1-11.32 0L1.3 12.7a1 1 0 0 1 0-1.42l4.95-4.95a8 8 0 0 1 11.32 0l4.95 4.95a1 1 0 0 1 0 1.42l-4.95 4.95zm-9.9-1.42a6 6 0 0 0 8.48 0L20.38 12l-4.24-4.24a6 6 0 0 0-8.48 0L3.4 12l4.25 4.24zM11.9 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0-2a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/></svg>
                                        <span class="pl-8 py-2">{{  $vendor->visits()->count() }} </span>
                                    </div>
                                    <div class="text-left w-1/3">
                                        @if($vendor->status)
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" aria-labelledby="check-circle" role="presentation" class="fill-current text-success absolute"><path d="M12 22a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm-2.3-8.7l1.3 1.29 3.3-3.3a1 1 0 0 1 1.4 1.42l-4 4a1 1 0 0 1-1.4 0l-2-2a1 1 0 0 1 1.4-1.42z"></path></svg>
                                            <span class="pl-6">เผยแพร่แล้ว </span>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" aria-labelledby="x-circle" role="presentation" class="fill-current text-danger absolute"><path d="M4.93 19.07A10 10 0 1 1 19.07 4.93 10 10 0 0 1 4.93 19.07zm1.41-1.41A8 8 0 1 0 17.66 6.34 8 8 0 0 0 6.34 17.66zM13.41 12l1.42 1.41a1 1 0 1 1-1.42 1.42L12 13.4l-1.41 1.42a1 1 0 1 1-1.42-1.42L10.6 12l-1.42-1.41a1 1 0 1 1 1.42-1.42L12 10.6l1.41-1.42a1 1 0 1 1 1.42 1.42L13.4 12z"></path></svg>
                                            <span class="pl-6">รออนุมัติ</span>
                                        @endif
                                    </div>
                                    <div class="text-right w-1/3">{{ $vendor->user->name }}</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
                @else
                    <div class="w-full  flex flex-col h-32 text-center bg-white">
                        <p class="mt-10 text-gray-800 text-base">ยังไม่มีข้อมูลธุรกิจในระบบ </p>
                        <a  href="/app/resources/vendors">
                            <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-1 px-2 border border-blue-500 hover:border-transparent rounded">
                                เพิ่ม ธุรกิจ
                            </button>
                        </a>
                    </div>
                @endif

            </div>

            {{-- สินค้าของคุณ --}}
            <div class="mx-2">
                <div class="w-full mt-4 flex flex-row p-2  border-b-2 ">
                    <div class="text-base w-1/2 font-bold text-left text-blue-600 subpixel-antialiased">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" class="fill-current absolute"><path d="M2 2c0-1.1.9-2 2-2h12a2 2 0 0 1 2 2v18l-8-4-8 4V2z"/></svg>
                        <span class="pl-8 py-2">ข้อมูลสินค้าของคุณ</span>
                    </div>
                    <div class="text-base w-1/2 font-bold text-right  subpixel-antialiased">
                        <a class="px-2 py-1 mt-2  text-gray-100 bg-blue-500 hover:text-gray-200 hover:bg-blue-800 rounded" href="/app/resources/products" target="_blank">จัดการข้อมูลสินค้า</a>
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap  w-full xl:mx-0 rounded-lg">
                <div class="flex flex-wrap  w-full xl:mx-0">
                    @if (count($products) > 0  )
                        @foreach ($products as $product)
                            <div class="w-full  flex flex-col md:w-1/2 lg:w-1/3 xl:w-1/3">
                                <a href="/product/{{ $product->id }}" class=" flex flex-col flex-1 bg-white rounded shadow hover:shadow-lg translateY-2px m-4 p-2 no-underline transition">
                                    <p class="mb-2 text-blue-500 text-sm font-semibold text-left">{{ $product->name }} </p>
                                    <div class="aspect-16x9 rounded"
                                        style="background:url('{{  Storage::url($product->image) }}') no-repeat center center/cover">
                                    </div>
                                    <div class="p-2 flex flex-col flex-1 bg-white  rounded-b-lg subpixel-antialiased">

                                        <div class="text-left text-sm font-thin flex-1">
                                            <p> {{Str::of( $product->description)->limit(100) }} </p>
                                        </div>
                                        <div class="w-full  flex flex-1 flex-row border-t-2 text-sm font-thin ">

                                            <div class="text-left w-1/3">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="fill-current absolute" viewBox="0 0 24 24" width="24" height="24"><path class="heroicon-ui" d="M17.56 17.66a8 8 0 0 1-11.32 0L1.3 12.7a1 1 0 0 1 0-1.42l4.95-4.95a8 8 0 0 1 11.32 0l4.95 4.95a1 1 0 0 1 0 1.42l-4.95 4.95zm-9.9-1.42a6 6 0 0 0 8.48 0L20.38 12l-4.24-4.24a6 6 0 0 0-8.48 0L3.4 12l4.25 4.24zM11.9 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0-2a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/></svg>
                                                <span class="pl-8 ">{{  $product->visits()->count() }} </span>
                                            </div>
                                            <div class="text-left w-1/3">
                                                @if($product->status)
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" aria-labelledby="check-circle" role="presentation" class="fill-current text-success absolute"><path d="M12 22a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm-2.3-8.7l1.3 1.29 3.3-3.3a1 1 0 0 1 1.4 1.42l-4 4a1 1 0 0 1-1.4 0l-2-2a1 1 0 0 1 1.4-1.42z"></path></svg>
                                                    <span class="pl-6">เผยแพร่แล้ว </span>
                                                @else
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" aria-labelledby="x-circle" role="presentation" class="fill-current text-danger absolute"><path d="M4.93 19.07A10 10 0 1 1 19.07 4.93 10 10 0 0 1 4.93 19.07zm1.41-1.41A8 8 0 1 0 17.66 6.34 8 8 0 0 0 6.34 17.66zM13.41 12l1.42 1.41a1 1 0 1 1-1.42 1.42L12 13.4l-1.41 1.42a1 1 0 1 1-1.42-1.42L10.6 12l-1.42-1.41a1 1 0 1 1 1.42-1.42L12 10.6l1.41-1.42a1 1 0 1 1 1.42 1.42L13.4 12z"></path></svg>
                                                    <span class="pl-6">รออนุมัติ</span>
                                                @endif
                                            </div>
                                            <div class="text-right w-1/3">{{ $product->vendor->name }}</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @else
                        <div class="w-full  flex flex-col h-32 text-center bg-white">
                            <p class="mt-10 text-gray-800 text-base ">ธุรกิจนี้ยังไม่มีสินค้าในระบบ</p>
                            <a href="/app/resources/products">
                                <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-1 px-2 border border-blue-500 hover:border-transparent rounded">
                                    เพิ่ม สินค้า
                                </button>
                            </a>
                        </div>
                    @endif
                </div>

            </div>

            {{-- โพส --}}
            <div class="mx-2">
                <div class="w-full mt-4 flex flex-row p-2  border-b-2 ">
                    <div class="text-base w-1/2 font-bold text-left text-blue-600 subpixel-antialiased">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" class="fill-current absolute"><path d="M2 2c0-1.1.9-2 2-2h12a2 2 0 0 1 2 2v18l-8-4-8 4V2z"/></svg>
                        <span class="pl-8 py-2">ข้อมูลโพสโฆษณา</span>
                    </div>
                    <div class="text-base w-1/2 font-bold text-right  subpixel-antialiased">
                        <a class="px-2 py-1 mt-2  text-gray-100 bg-blue-500 hover:text-gray-200 hover:bg-blue-800 rounded" href="/app/resources/posts" target="_blank">จัดการโพสโฆษณา</a>
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap  w-full xl:mx-0 rounded-lg">
                <div class="flex flex-wrap  w-full xl:mx-0">
                    @if (count($posts) > 0  )
                    @foreach ($posts as $post)
                    <div class="w-full  flex flex-col md:w-1/2 lg:w-1/3 xl:w-1/3">
                        <a href="/post/{{ $post->slug }}" class=" flex flex-col flex-1 bg-white rounded shadow hover:shadow-lg translateY-2px m-4 p-2 no-underline transition">
                            <div class="aspect-16x9 rounded"
                                style="background:url('{{  Storage::url($post->post_image) }}') no-repeat center center/cover">
                            </div>
                            <div class="flex flex-col flex-1 bg-white  rounded-b-lg subpixel-antialiased">
                                <p class="mb-2 text-blue-500 text-sm font-semibold text-left">{{ $post->title }} </p>

                                <div class="text-left text-sm font-thin flex-1">
                                    <p> {{Str::of( $post->content)->limit(100) }} </p>
                                </div>
                                <div class="w-full  flex  flex-row flex-1 border-t-2 text-sm font-thin ">

                                    <div class="text-left w-1/3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="fill-current absolute" viewBox="0 0 24 24" width="24" height="24"><path class="heroicon-ui" d="M17.56 17.66a8 8 0 0 1-11.32 0L1.3 12.7a1 1 0 0 1 0-1.42l4.95-4.95a8 8 0 0 1 11.32 0l4.95 4.95a1 1 0 0 1 0 1.42l-4.95 4.95zm-9.9-1.42a6 6 0 0 0 8.48 0L20.38 12l-4.24-4.24a6 6 0 0 0-8.48 0L3.4 12l4.25 4.24zM11.9 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0-2a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/></svg>
                                        <span class="pl-8 ">{{  $post->visits()->count() }} </span>
                                    </div>
                                    <div class="text-left w-1/3">
                                        @if($post->published)
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" aria-labelledby="check-circle" role="presentation" class="fill-current text-success absolute"><path d="M12 22a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm-2.3-8.7l1.3 1.29 3.3-3.3a1 1 0 0 1 1.4 1.42l-4 4a1 1 0 0 1-1.4 0l-2-2a1 1 0 0 1 1.4-1.42z"></path></svg>
                                            <span class="pl-6">เผยแพร่แล้ว </span>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" aria-labelledby="x-circle" role="presentation" class="fill-current text-danger absolute"><path d="M4.93 19.07A10 10 0 1 1 19.07 4.93 10 10 0 0 1 4.93 19.07zm1.41-1.41A8 8 0 1 0 17.66 6.34 8 8 0 0 0 6.34 17.66zM13.41 12l1.42 1.41a1 1 0 1 1-1.42 1.42L12 13.4l-1.41 1.42a1 1 0 1 1-1.42-1.42L10.6 12l-1.42-1.41a1 1 0 1 1 1.42-1.42L12 10.6l1.41-1.42a1 1 0 1 1 1.42 1.42L13.4 12z"></path></svg>
                                            <span class="pl-6">รออนุมัติ</span>
                                        @endif
                                    </div>
                                    <div class="text-right w-1/3">{{ $post->vendor->name }}</div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
                    @else
                        <div class="w-full  flex flex-col h-32 text-center bg-white">
                            <p class="mt-10 text-gray-800 text-base ">ธุรกิจนี้ยังไม่มีโพสในระบบ</p>
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

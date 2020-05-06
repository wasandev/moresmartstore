@extends('layouts.app')
@section('nav')
    @include('partials.nav')
@endsection



@section('mstorehome')
    @include('partials.mstorehome')
@endsection
@section('search')
    @include('partials.searchhome')
@endsection
@section('businesstype')
    @include('partials.businesstype')
@endsection



@section('content')
<div class="w-max-full mx-auto">
    <div class="flex">
        <div class="max-w-full w-full xl:w-3/4">
            {{--post --}}
            <div class="xl:hidden">


                <div class="mx-4">
                    <div class="w-full mt-4 flex flex-row p-2 md:p-2   bg-gray-800 rounded">

                        <div class="text-sm md:text-base w-1/2 font-thin md:font-normal text-left text-white subpixel-antialiased">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" class="fill-current absolute"><path d="M2 2c0-1.1.9-2 2-2h12a2 2 0 0 1 2 2v18l-8-4-8 4V2z"/></svg>
                            <span class="pl-8 py-2">โพสล่าสุด</span>
                        </div>
                        <div class="text-sm w-1/2 font-thin text-right  subpixel-antialiased">
                            <a class="px-2 py-1 mt-2  text-white rounded  bg-gray-500 hover:bg-blue-700" href="/post">ดูทั้งหมด</a>
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap  w-full xl:mx-0 rounded-lg">
                    <div class="flex flex-wrap  w-full xl:mx-0 ">
                        @foreach ($posts as $post)
                            <div class="w-full  flex flex-col md:w-1/2 lg:w-1/3 xl:w-1/3">
                                <a href="/post/{{ $post->slug }}" class=" flex flex-col flex-1 bg-white rounded shadow hover:shadow-lg translateY-2px m-4 p-2 no-underline transition">
                                    <p class="mb-2 text-grey-900 text-sm font-semibold text-left">{{ $post->title }} </p>
                                    {{-- <div class="aspect-16x9 rounded"
                                        style="background:url('{{  Storage::url($post->post_image) }}') no-repeat center center/cover">
                                    </div> --}}
                                    <div class="p-2 flex flex-col flex-1 bg-white  rounded-b-lg subpixel-antialiased">

                                        <div class="mb-3 w-full mx-auto text-left text-sm font-thin ">
                                            <p> {{Str::of( $post->content)->limit(100) }} </p>
                                            <p class="text-blue-500">ดูข้อมูลเพิ่มเติม</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            {{--vendor --}}
            <div class="mx-4">
                <div class="w-full mt-4 flex flex-row p-2 md:p-2   bg-gray-800 rounded">

                    <div class="text-sm md:text-base w-1/2 font-thin md:font-normal text-left text-white subpixel-antialiased">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" class="fill-current absolute"><path d="M10 12a6 6 0 1 1 0-12 6 6 0 0 1 0 12zm0-3a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm4 2.75V20l-4-4-4 4v-8.25a6.97 6.97 0 0 0 8 0z"/></svg>
                        <span class="pl-8 py-2">ธุรกิจมาใหม่</span>
                    </div>
                    <div class="text-sm w-1/2 font-thin text-right  subpixel-antialiased">
                        <a class="px-2 py-1 mt-2  text-white rounded  bg-gray-500 hover:bg-blue-700" href="/blog">ดูทั้งหมด</a>
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap  w-full xl:mx-0 rounded-lg">
                <div class="flex flex-wrap  w-full xl:mx-0 ">
                    @foreach ($vendors as $vendor)
                        <div class="w-full  flex flex-col md:w-1/2 lg:w-1/4 xl:w-1/4">
                            <a href="/blog" class=" flex flex-col flex-1 rounded shadow hover:shadow-lg translateY-2px m-4 no-underline transition">
                                {{-- <div class="aspect-16x9 rounded-t-lg"
                                    style="background:url('{{  Storage::url($vendor->imagefile) }}') no-repeat center center/cover">
                                </div> --}}
                                <div class="p-2 flex flex-col flex-1 bg-white  rounded-b-lg subpixel-antialiased">
                                    <p class="mb-2 text-grey-900 text-sm font-semibold text-left">{{ $vendor->name }} </p>
                                    <div class="mb-3 w-full mx-auto text-left text-sm font-thin ">
                                        <p> {{Str::of( $vendor->description)->limit(100) }} </p>
                                        <p class="text-blue-500">ดูข้อมูลเพิ่มเติม</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
            {{--  Blogs --}}
            <div class="w-full mx-auto rounded-lg  m-2">
                <div class="mx-4">
                    <div class="w-full mt-4 flex flex-row p-2 md:p-2   bg-gray-800 rounded">
                        <div class="text-sm md:text-base w-1/2 font-thin md:font-normal text-left text-white subpixel-antialiased">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" class="fill-current absolute"><path d="M16 2h4v15a3 3 0 0 1-3 3H3a3 3 0 0 1-3-3V0h16v2zm0 2v13a1 1 0 0 0 1 1 1 1 0 0 0 1-1V4h-2zM2 2v15a1 1 0 0 0 1 1h11.17a2.98 2.98 0 0 1-.17-1V2H2zm2 8h8v2H4v-2zm0 4h8v2H4v-2zM4 4h8v4H4V4z"/></svg>
                            <span class="pl-8 py-2">บทความ</span>
                        </div>
                        <div class="text-sm w-1/2 font-thin text-right text-gray-100  subpixel-antialiased">
                            <a class="px-2 py-1 mt-2  text-white rounded  bg-gray-500 hover:bg-blue-700" href="/blog">ดูทั้งหมด</a>
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap  w-full xl:mx-0 ">
                    @foreach ($blogs as $blog)
                        <div class="w-full  flex flex-col md:w-1/2 lg:w-1/4 xl:w-1/4">
                        <a href="/blog/{{ $blog->slug }}" class=" flex flex-col flex-1 rounded shadow hover:shadow-lg translateY-2px m-4 no-underline transition">
                                <div class="aspect-16x9 rounded-t-lg"
                                    style="background:url('{{  Storage::url($blog->blog_image) }}') no-repeat center center/cover">
                                </div>
                                <div class="p-2 flex flex-col flex-1 bg-white text-left rounded-b-lg subpixel-antialiased">
                                    <p class="mb-2 text-grey-900 text-sm font-semibold">{{$blog->title}}</p>

                                    <div class="mb-3 w-full mx-auto text-left text-sm font-thin ">
                                        <p>{{ Str::of( $blog->blog_content)->limit(100) }}</p>
                                        <p class="text-blue-500">อ่านต่อ</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
        {{-- //right-side --}}
        <div class="hidden  xl:block xl:w-1/4 h-full ">
            <div class="mx-4">
                <div class="w-full mt-4 flex flex-row p-2 md:p-2   bg-gray-800 rounded">

                    <div class="text-sm md:text-base w-1/2 font-thin md:font-normal text-left text-white subpixel-antialiased">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" class="fill-current absolute"><path d="M2 2c0-1.1.9-2 2-2h12a2 2 0 0 1 2 2v18l-8-4-8 4V2z"/></svg>
                        <span class="pl-8 py-2">โพสล่าสุด</span>
                    </div>
                    <div class="text-sm w-1/2 font-thin text-right  subpixel-antialiased">
                        <a class="px-2 py-1 mt-2  text-white rounded  bg-gray-500 hover:bg-blue-700" href="/post">ดูทั้งหมด</a>
                    </div>
                </div>
            </div>
            <div class="flex flex-col justify-between overflow-y-auto sticky top-0  ">
                @foreach ($posts as $post)
                    <a href="/post/{{ $post->slug }}" class=" flex flex-col flex-1 bg-white rounded shadow hover:shadow-lg translateY-2px m-4  p-2 no-underline transition">
                        <div class=" w-full mx-auto rounded-lg">

                            <p class="mb-2 text-grey-900 text-sm font-semibold"> {{ $post->title }}</p>
                            {{-- <div class="aspect-16x9"
                                        style="background:url('{{  Storage::url($post->post_image) }}') no-repeat center center/cover">
                            </div> --}}
                            <div class="mb-3 w-full mx-auto text-left text-sm font-thin ">
                                <p class="text-sm font-thin">{{ Str::of( $post->content)->limit(100) }}</p>
                                <p class="text-blue-500">อ่านต่อ</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>


@endsection

@section('footer')
    @include('partials.footer')

@endsection

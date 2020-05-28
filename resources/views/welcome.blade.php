@extends('layouts.app')
@section('nav')
    @include('partials.nav')
@endsection

@section('search')
    @include('partials.search')
@endsection

@section('mstorehome')
    @include('partials.mstorehome')
@endsection

@section('businesstype')
    @include('partials.businesstype')
@endsection



@section('content')
<div id="app" class="w-max-full mx-auto">
    <div class="flex">
        <div class="max-w-full w-full xl:w-3/4">

            {{--vendor --}}
            <div class="mx-2">
                <div class="w-full mt-4 flex flex-row p-2  border-b-2 ">

                    <div class="text-base w-1/2 font-bold text-left text-blue-600 subpixel-antialiased">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" class="fill-current absolute"><path d="M2 2c0-1.1.9-2 2-2h12a2 2 0 0 1 2 2v18l-8-4-8 4V2z"/></svg>
                        <span class="pl-8 py-2">ธุรกิจมาใหม่</span>
                    </div>
                    <div class="text-base w-1/2 font-bold text-right  subpixel-antialiased">
                        <a class="px-2 py-1 mt-2  text-blue-600  hover:text-blue-700 hover:bg-gray-300 rounded" href="/classified">ดูทั้งหมด</a>
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap  w-full xl:mx-0 rounded-lg">
                @foreach ($vendors as $vendor)
                    <div class="w-full flex flex-col md:w-1/2 lg:w-1/3 xl:w-1/3">
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

                                    <div class="text-left w-1/2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="fill-current absolute" viewBox="0 0 24 24" width="24" height="24"><path class="heroicon-ui" d="M17.56 17.66a8 8 0 0 1-11.32 0L1.3 12.7a1 1 0 0 1 0-1.42l4.95-4.95a8 8 0 0 1 11.32 0l4.95 4.95a1 1 0 0 1 0 1.42l-4.95 4.95zm-9.9-1.42a6 6 0 0 0 8.48 0L20.38 12l-4.24-4.24a6 6 0 0 0-8.48 0L3.4 12l4.25 4.24zM11.9 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0-2a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/></svg>
                                        <span class="pl-8 py-2">{{  $vendor->visits()->count() }} </span>
                                    </div>

                                    <div class="text-right w-1/2">{{ $vendor->user->name }}</div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>
            {{--  Product --}}
            <div class="mx-2">

                <div class="w-full mt-4 flex flex-row p-2  border-b-2 ">

                    <div class="text-base w-1/2 font-bold  text-left text-blue-600 subpixel-antialiased">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="fill-current absolute"><path class="heroicon-ui" d="M5 3h4a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5c0-1.1.9-2 2-2zm0 2v4h4V5H5zm10-2h4a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2h-4a2 2 0 0 1-2-2V5c0-1.1.9-2 2-2zm0 2v4h4V5h-4zM5 13h4a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4c0-1.1.9-2 2-2zm0 2v4h4v-4H5zm10-2h4a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2h-4a2 2 0 0 1-2-2v-4c0-1.1.9-2 2-2zm0 2v4h4v-4h-4z"/></svg>
                        <span class="pl-8 py-2">สินค้ามาใหม่</span>
                    </div>
                    <div class="text-base w-1/2 font-bold  text-right  subpixel-antialiased">
                        <a class="px-2 py-1 mt-2  text-blue-600  hover:text-blue-700 hover:bg-gray-300 rounded" href="/product">ดูทั้งหมด</a>
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap  w-full xl:mx-0">
                @foreach ($products as $product)
                <div class="w-full  flex flex-col md:w-1/3 lg:w-1/3 xl:w-1/3">
                    <a href="/blog/{{ $product->id }}" class=" flex flex-col flex-1 rounded shadow hover:shadow-lg translateY-2px m-4 no-underline transition">
                            <div class="aspect-16x9 rounded-t-lg"
                                style="background:url('{{  Storage::url($product->image) }}') no-repeat center center/cover">
                            </div>
                            <p class="p-2  text-grey-900 text-base font-semibold text-left text-blue-500">{{ $product->name }} </p>

                            <div class="p-2 flex flex-col flex-1 bg-white text-left rounded-b-lg subpixel-antialiased">
                                <div class="text-left text-sm flex-1 font-thin ">
                                    <p> {{Str::of( $product->description)->limit(200) }} </p>
                                </div>
                                <div class="w-full flex  flex-row border-t-2 text-sm font-thin ">

                                    <div class="text-left w-1/2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="fill-current absolute" viewBox="0 0 24 24" width="24" height="24"><path class="heroicon-ui" d="M17.56 17.66a8 8 0 0 1-11.32 0L1.3 12.7a1 1 0 0 1 0-1.42l4.95-4.95a8 8 0 0 1 11.32 0l4.95 4.95a1 1 0 0 1 0 1.42l-4.95 4.95zm-9.9-1.42a6 6 0 0 0 8.48 0L20.38 12l-4.24-4.24a6 6 0 0 0-8.48 0L3.4 12l4.25 4.24zM11.9 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0-2a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/></svg>
                                        <span class="pl-8 py-2">{{  $product->visits()->count() }} </span>
                                    </div>

                                    <div class="text-right w-1/2">{{ $product->vendor->name }}</div>
                                </div>
                            </div>
                        </a>
                </div>
                @endforeach
            </div>

            {{--post --}}
            <div class="xl:hidden">


                <div class="mx-2">
                    <div class="w-full mt-4 flex flex-row p-2  border-b-2 ">

                        <div class="text-base w-1/2 font-bold text-left text-blue-600 subpixel-antialiased">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" class="fill-current absolute"><path d="M2 2c0-1.1.9-2 2-2h12a2 2 0 0 1 2 2v18l-8-4-8 4V2z"/></svg>
                            <span class="pl-8 py-2">โพสล่าสุด</span>
                        </div>
                        <div class="text-base w-1/2 font-bold  text-right  subpixel-antialiased">
                            <a class="px-2 py-1 mt-2  text-blue-600  hover:text-blue-700 hover:bg-gray-300 rounded" href="/post">ดูทั้งหมด</a>
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap  w-full xl:mx-0 rounded-lg">
                    <div class="flex flex-wrap  w-full xl:mx-0 ">
                        @foreach ($posts as $post)
                            <div class="w-full  flex flex-col md:w-1/2 lg:w-1/3 xl:w-1/3">
                                <a href="/post/{{ $post->slug }}" class=" flex flex-col flex-1 bg-white rounded shadow hover:shadow-lg translateY-2px m-4 p-2 no-underline transition">
                                     <div class="aspect-16x9 rounded"
                                        style="background:url('{{  Storage::url($post->post_image) }}') no-repeat center center/cover">
                                    </div>
                                    <div class="flex flex-col flex-1 bg-white  rounded-b-lg subpixel-antialiased">
                                        <p class=" mb-2 text-blue-500 text-sm font-semibold text-left">{{ $post->title }} </p>

                                        <div class="text-left text-sm font-thin flex-1">
                                            <p> {{Str::of( $post->content)->limit(100) }} </p>
                                        </div>
                                        <div class="w-full  flex  flex-row border-t-2 text-sm font-thin ">

                                            <div class="text-left w-1/2">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="fill-current absolute" viewBox="0 0 24 24" width="24" height="24"><path class="heroicon-ui" d="M17.56 17.66a8 8 0 0 1-11.32 0L1.3 12.7a1 1 0 0 1 0-1.42l4.95-4.95a8 8 0 0 1 11.32 0l4.95 4.95a1 1 0 0 1 0 1.42l-4.95 4.95zm-9.9-1.42a6 6 0 0 0 8.48 0L20.38 12l-4.24-4.24a6 6 0 0 0-8.48 0L3.4 12l4.25 4.24zM11.9 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0-2a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/></svg>
                                                <span class="pl-8 py-2">{{  $post->visits()->count() }} </span>
                                            </div>

                                            <div class="text-right w-1/2">{{ $post->vendor->name }}</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            {{--  Blogs --}}
            <div class="w-full mx-auto rounded-lg  m-2">
                <div class="mx-4">

                    <div class="w-full mt-4 flex flex-row p-2  border-b-2 ">

                        <div class="text-base w-1/2 font-bold  text-left text-blue-600 subpixel-antialiased">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" class="fill-current absolute"><path d="M16 2h4v15a3 3 0 0 1-3 3H3a3 3 0 0 1-3-3V0h16v2zm0 2v13a1 1 0 0 0 1 1 1 1 0 0 0 1-1V4h-2zM2 2v15a1 1 0 0 0 1 1h11.17a2.98 2.98 0 0 1-.17-1V2H2zm2 8h8v2H4v-2zm0 4h8v2H4v-2zM4 4h8v4H4V4z"/></svg>
                            <span class="pl-8 py-2">บทความ</span>
                        </div>
                        <div class="text-base w-1/2 font-bold  text-right  subpixel-antialiased">
                            <a class="px-2 py-1 mt-2  text-blue-600  hover:text-blue-700 hover:bg-gray-300 rounded" href="/blog">ดูทั้งหมด</a>
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
                                <p class="p-2  text-grey-900 text-base font-semibold text-left text-blue-500">{{ $blog->title }} </p>

                                <div class="p-2 flex flex-col flex-1 bg-white text-left rounded-b-lg subpixel-antialiased">
                                    <div class="text-left text-sm flex-1 font-thin ">
                                        <p> {{Str::of( $blog->blog_content)->limit(200) }} </p>
                                    </div>
                                    <div class="w-full  flex  flex-row border-t-2 text-sm font-thin ">

                                        <div class="text-left w-1/2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="fill-current absolute" viewBox="0 0 24 24" width="24" height="24"><path class="heroicon-ui" d="M17.56 17.66a8 8 0 0 1-11.32 0L1.3 12.7a1 1 0 0 1 0-1.42l4.95-4.95a8 8 0 0 1 11.32 0l4.95 4.95a1 1 0 0 1 0 1.42l-4.95 4.95zm-9.9-1.42a6 6 0 0 0 8.48 0L20.38 12l-4.24-4.24a6 6 0 0 0-8.48 0L3.4 12l4.25 4.24zM11.9 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0-2a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/></svg>
                                            <span class="pl-8 py-2">{{  $blog->visits()->count() }} </span>
                                        </div>

                                        <div class="text-right w-1/2">{{ $blog->blog_cat->name }}</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
        {{-- //right-side --}}
        <div class="hidden  xl:block xl:w-1/4 h-full  ">
            <div class="mx-2">
                <div class="w-full mt-4 flex flex-row p-2  border-b-2 bg-gray-300 rounded-lg ">

                    <div class="text-base w-1/2 font-bold text-left text-blue-600 subpixel-antialiased">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" class="fill-current absolute"><path d="M2 2c0-1.1.9-2 2-2h12a2 2 0 0 1 2 2v18l-8-4-8 4V2z"/></svg>
                        <span class="pl-8 py-2">โพสล่าสุด</span>
                    </div>
                    <div class="text-base w-1/2 font-bold  text-right  subpixel-antialiased">
                        <a class="px-2 py-1 mt-2  text-blue-600  hover:text-blue-700 hover:bg-gray-300 rounded" href="/post">ดูทั้งหมด</a>
                    </div>
                </div>
            </div>
            <div class="flex flex-col justify-between overflow-y-auto sticky top-0  ">
                @foreach ($posts as $post)
                <a href="/post/{{ $post->slug }}" class=" flex flex-col flex-1 bg-white rounded shadow hover:shadow-lg translateY-2px m-2 p-2 no-underline transition">
                    <div class="aspect-16x9 rounded"
                        style="background:url('{{  Storage::url($post->post_image) }}') no-repeat center center/cover">
                    </div>
                    <div class="flex flex-col flex-1 bg-white  rounded-b-lg subpixel-antialiased">
                        <p class="mb-2 text-grey-900 text-base font-semibold text-left text-blue-500">{{ $post->title }} </p>

                        <div class="text-left text-sm font-thin flex-1 ">
                            <p> {{Str::of( $post->content)->limit(100) }} </p>
                        </div>
                        <div class="w-full  flex  flex-row border-t-2 text-sm font-thin ">

                            <div class="text-left w-1/2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="fill-current absolute" viewBox="0 0 24 24" width="24" height="24"><path class="heroicon-ui" d="M17.56 17.66a8 8 0 0 1-11.32 0L1.3 12.7a1 1 0 0 1 0-1.42l4.95-4.95a8 8 0 0 1 11.32 0l4.95 4.95a1 1 0 0 1 0 1.42l-4.95 4.95zm-9.9-1.42a6 6 0 0 0 8.48 0L20.38 12l-4.24-4.24a6 6 0 0 0-8.48 0L3.4 12l4.25 4.24zM11.9 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0-2a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/></svg>
                                <span class="pl-8 py-2">{{  $post->visits()->count() }} </span>
                            </div>

                            <div class="text-right w-1/2">{{ $post->vendor->name }}</div>
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

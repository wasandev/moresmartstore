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

@section('content')

<div id="app"  class="max-w-full mx-auto sm:justify-between sm:items-center  sm:py-3 bg-white">
    <div class="flex items-center justify-between px-4 py-4 sm:p-0  bg-gray-800 sm:hidden ">

       <div class="block lg:hidden ">
            <button class=" block text-blue-500 hover:text-white focus:text-white focus:outline-none" type="button" onclick="openDropdown(event,'pages')">
                <svg class="h-6 w-6 fill-current absolute" viewBox="0 0 24 24">
                <path  fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"/>
                </svg>
                <span class="ml-6">MENU</span>
            </button>
            <div class="hidden bg-black  text-base z-50 float-left py-2 list-none text-left rounded shadow-lg mb-1" style="min-width:12rem" id="pages">
                @foreach ($pages as $listpage)
                <a href="/pages/{{$listpage->slug}}" class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-100 hover:bg-white hover:text-black">
                   {{$listpage->title}}
                </a>
                @endforeach
               </div>
        </div>
        <div class="flex text-left flex-no-shrink mr-0 ">

            <h2 class="text-gray-100">เกี่ยวกับ mStore</h2>


        </div>

    </div>
    <!--Container-->
    <div class="flex flex-wrap">

        <nav id = "pages-nav" class="sm:block w-full hidden text-base font-normal   shadow-lg md:w-1/4 ">
            <div class="hidden sm:block text-blue-700 border-b-2 border-gray-200 p-2 items-center text-center text-xl ">
                <svg xmlns="http://www.w3.org/2000/svg" class="fill-current absolute" viewBox="0 0 24 24" width="24" height="24"><path class="heroicon-ui" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"/></svg>
                <span class="ml-6">เกี่ยวกับ mStore</span>
            </div>
            <div class="p-2 sm:flex sm:p-0 ">
                <div class="w-full mx-auto ">
                    @foreach ($pages as $listpage)
                        <a href="/pages/{{$listpage->slug}}" class="block p-2 text-base font-normal text-gray-900  border-b border-gray-300 hover:bg-blue-500 hover:text-white">
                            {{-- <svg xmlns="http://www.w3.org/2000/svg" class=" fill-current absolute" viewBox="0 0 24 24" width="24" height="24"><path class="heroicon-ui" d="M18.59 13H3a1 1 0 0 1 0-2h15.59l-5.3-5.3a1 1 0 1 1 1.42-1.4l7 7a1 1 0 0 1 0 1.4l-7 7a1 1 0 0 1-1.42-1.4l5.3-5.3z"/></svg> --}}
                            <span class="ml-1">{{$listpage->title}}</span>
                        </a>
                    @endforeach
                </div>
            </div>
        </nav>
        <div class="hidden md:block md:w-3/4">
            @include('pages.content')
        </div>

    </div>
    <div class="md:hidden">
        @include('pages.content')
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

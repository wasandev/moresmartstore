@extends('layouts.app')

@section('nav')
    @include('partials.nav')
@endsection

@section('search')
    @include('partials.search')
@endsection

{{-- @section('mstorehome')
    @include('partials.mstorehome')
@endsection --}}

@section('content')

<div id="app"  class="max-w-full mx-auto sm:justify-between sm:items-center  sm:py-3 bg-white">
    <div class="flex items-center justify-between px-4 py-4 sm:p-0  bg-gray-800 sm:hidden ">

        <div class="">
            <button class="page-sign block text-blue-500 hover:text-white focus:text-white focus:outline-none">
                <svg class="h-6 w-6 fill-current absolute" viewBox="0 0 24 24">
                <path  fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"/>
                </svg>
                <span class="ml-6">MENU</span>
            </button>
        </div>
        <div class="flex text-left flex-no-shrink mr-0 ">

            <h2 class="text-gray-100">เกี่ยวกับ mStore</h2>


        </div>

    </div>
    <!--Container-->
    <div class="flex flex-wrap">

        <nav id = "pages-nav" class="sm:block w-full hidden text-sm font-medium p-2  shadow-lg md:w-1/4 ">
            <div class="hidden sm:block text-blue-700 border border-gray-200 p-2 items-center text-center text-xl rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="fill-current absolute" viewBox="0 0 24 24" width="24" height="24"><path class="heroicon-ui" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"/></svg>
                <span class="ml-6">เกี่ยวกับ mStore</span>
            </div>
            <div class="px-2 sm:flex sm:p-0 ">
                <div class="w-full mx-auto m-1">
                    @foreach ($pages as $listpage)
                        <a href="/pages/{{$listpage->slug}}" class="block p-2 text-base font-medium text-gray-900  rounded-full hover:bg-blue-500 hover:text-white">
                            {{-- <svg xmlns="http://www.w3.org/2000/svg" class=" fill-current absolute" viewBox="0 0 24 24" width="24" height="24"><path class="heroicon-ui" d="M18.59 13H3a1 1 0 0 1 0-2h15.59l-5.3-5.3a1 1 0 1 1 1.42-1.4l7 7a1 1 0 0 1 0 1.4l-7 7a1 1 0 0 1-1.42-1.4l5.3-5.3z"/></svg> --}}
                            <span class="ml-6">{{$listpage->title}}</span>
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
@section('footer')
    @include('partials.footer')

@endsection
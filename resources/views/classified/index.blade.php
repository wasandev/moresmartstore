@extends('layouts.app')
@section('nav')
    @include('partials.nav')
@endsection

@section('content')

<div id="app"  class="max-w-full mx-auto sm:justify-between sm:items-center  sm:py-3">
    <div  class="max-w-full mx-auto bg-gray-400 pt-16">
        <search-vendor></search-vendor>
     </div>
    <div class="flex items-center justify-between px-4 py-3 sm:p-0  bg-gray-800 block sm:hidden ">

        <div class="">
            <button class="sidebar-sign block text-blue-500 hover:text-white focus:text-white focus:outline-none">
                <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24">
                <path  fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"/>
                </svg>
            </button>
        </div>
        <div class="flex text-left flex-no-shrink mr-0 ">

            <h2 class="text-gray-100">เลือกประเภทธุรกิจ</h2>

        </div>

    </div>
    <div class="flex flex-wrap">
        <nav id = "sidebar-nav" class="sm:block sm:w-full hidden text-sm font-medium  md:w-1/4">
            <div class="px-2 pt-2 pb-4 sm:flex sm:p-0">
                  <div class="grid grid-cols-1 gap-1 bg-gray-200 p-2 ">

                    @foreach ($businessData as $item)

                        <router-link class="block px-2 py-2 text-base text-gray-800 bg-blue-400  hover:bg-blue-700 hover:text-white"
                        to="/classified/{{$item->id}}" exact>
                            {{ $item->name }} - <span class="text-gray-100">({{ $item->vendors_count }} ธุรกิจ)</span>
                        </router-link>
                    @endforeach
                </div>
            </div>

        </nav>
        <div class="hidden md:block md:w-3/4 p-4">
            <router-view></router-view>

        </div>
    </div>
    <div class="md:hidden p-2">
        <router-view></router-view>
    </div>
</div>
@endsection

@section('footer')
    @include('partials.footer')

@endsection


@extends('layouts.app')
@section('nav')
    @include('partials.nav')
@endsection
@section('search')
    @include('partials.productsearch')
@endsection


@section('content')

<div id="app"  class="max-w-full mx-auto sm:justify-between sm:items-center ">

    <div class="flex items-center justify-between px-4 py-4 sm:p-0  bg-gray-800 sm:hidden ">

        <div class="block lg:hidden ">
            <button class="sidebar-sign block text-blue-500 hover:text-white focus:text-white focus:outline-none" type="button" onclick="openDropdown(event,'category')">
                <svg class="h-6 w-6 fill-current absolute" viewBox="0 0 24 24">
                <path  fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"/>
                </svg>
                <span class="ml-6">เลือกประเภทสินค้า</span>
            </button>

            <div class="hidden bg-white  text-base z-50 float-left py-2 list-none text-left rounded shadow-lg mb-1" style="min-width:12rem" id="category">
                @foreach ($category as $item)
                <a href="/products/category/{{ $item->id }}" class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap  bg-transparent text-gray-800">
                   {{ $item->name }}
                </a>
                @endforeach
               </div>
        </div>


    </div>
    <div class="flex flex-wrap">
        <nav id = "sidebar-nav" class="sm:block w-full mx-auto hidden md:w-1/4 pt-4 shadow-lg">
            <div class="px-2 md:flex md:p-0 ">
                  <div class="grid grid-cols-1 gap-1 p-2 w-full ">
                    @foreach ($category as $item)
                        <a href="/products/category/{{ $item->id }}" class="block py-2 px-2 text-sm lg:text-base  text-white bg-blue-500 border  rounded   hover:bg-blue-600 hover:text-white hover:shadow">
                            {{ $item->name }}
                        </a>
                    @endforeach
                </div>
            </div>
        </nav>
        <div class="hidden md:block md:w-3/4 mx-auto">
            @include('products.listall')
        </div>
    </div>
    <div class="md:hidden">
            @include('products.listall')
    </div>
</div>
@include('partials.googleads1')
@endsection

@section('footer')
    @include('partials.footer')

@endsection

@extends('layouts.app')
@section('nav')
    @include('partials.nav')
@endsection
@section('search')
    @include('partials.productsearch')
@endsection

@section('content')

<div id="app"  class="max-w-full mx-auto sm:justify-between sm:items-center  sm:py-3">

    <div class="flex items-center justify-between px-4 py-4 sm:p-0  bg-gray-800 sm:hidden ">

        <div class="">
            <button class="sidebar-sign block text-blue-500 hover:text-white focus:text-white focus:outline-none">
                <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24">
                <path  fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"/>
                </svg>
            </button>
        </div>
        <div class="flex text-left flex-no-shrink mr-0 ">

            <h2 class="text-gray-100">เลือกประเภทสินค้า</h2>

        </div>

    </div>
    <div class="flex flex-wrap">
        <nav id = "sidebar-nav" class="sm:block w-full hidden text-sm font-medium md:w-1/4 ">
            <div class="px-2 sm:flex sm:p-0 ">
                  <div class="w-full grid grid-cols-1 gap-1  p-2 shadow-lg">
                    @foreach ($category as $item)
                        <a href="/products/category/{{ $item->id }}" class="block py-2 px-2 text-base font-medium text-gray-100 bg-blue-500 rounded lg:rounded-r-lg border-l-4 border-blue-200 hover:border-red-500 hover:bg-blue-700 hover:text-white">
                            {{ $item->name }} <span class="text-gray-400">({{ $item->products_count }} ธุรกิจ)</span>
                        </a>
                    @endforeach
                </div>
            </div>
        </nav>
        <div class="hidden md:block md:w-3/4">
            @include('products.listall')
        </div>
    </div>
    <div class="md:hidden">
            @include('products.listall')
    </div>
</div>
@endsection

@section('footer')
    @include('partials.footer')

@endsection

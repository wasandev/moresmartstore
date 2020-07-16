@extends('layouts.app')
@section('nav')
    @include('partials.nav')
@endsection

@section('search')
    @include('partials.productsearch')
@endsection

@section('content')

{{-- new post list for mobile--}}
<div id="app" class="max-w-full  mx-auto flex">

    <div class="w-full lg:max-w-xl lg:w-2/3 flex flex-col rounded-lg mt-2 ">
            {{-- product detail --}}
        <div class="p-2">


            <div class=" flex items-center justify-center">
                <img class="h-48 w-full object-cover" src="{{  Storage::url($product->image) }}" alt="{{$product->name}}">
            </div>
            <div class="bg-white rounded-b-none lg:rounded-t-r p-4 flex  flex-col justify-between leading-normal">
                <div class="mb-4">

                    <p class="font-bold text-xl text-blue-600">{{ $product->name }}</p>
                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-current absolute" viewBox="0 0 24 24" width="24" height="24"><path class="heroicon-ui" d="M17.56 17.66a8 8 0 0 1-11.32 0L1.3 12.7a1 1 0 0 1 0-1.42l4.95-4.95a8 8 0 0 1 11.32 0l4.95 4.95a1 1 0 0 1 0 1.42l-4.95 4.95zm-9.9-1.42a6 6 0 0 0 8.48 0L20.38 12l-4.24-4.24a6 6 0 0 0-8.48 0L3.4 12l4.25 4.24zM11.9 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0-2a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/></svg>
                    <span class="pl-8 py-2">การดู:{{  $product->visits()->count() }} ครั้ง </span>


                    <a href="/products/category/{{$product->category_id}}" class="text-blue-500 text-sm hover:text-blue700">
                        ประเภทสินค้า: {{$product->category->name}}
                    </a>
                    <p class="text-gray-700 text-base">{!! $product->description !!}</p>
                    <p class="w-full py-2 text-sm text-red-600 flex text-center">
                        <span class="text-lg font-semibold">ราคา: {{ number_format($product->price,2) }} บาท/{{$product->unit->name}}</span>
                    </p>
                    @if(!empty($product->shopurl))
                        <a href="{{$product->shopurl}}" class="bg-blue-500 p-2 rounded-full text-white text-sm hover:bg-blue-700" target="_blank">
                            สั่งซื้อออนไลน์
                        </a>
                    @endif
                </div>

            </div>

            <div class="p-2 flex flex-row justify-between leading-normal border-t border-gray-300 bg-white">

                <div class=" w-1/2 ">

                    <a class="flex text-blue-500 hover:text-blue-700 items-center" href="/vendors/{{ $product->vendor->id }}" >
                        <img class="w-10 h-10 rounded-full mr-2" src="{{  Storage::url($product->vendor->logofile) }}" alt="{{ $product->vendor->name }}">
                        <span class="text-blue-700 "> {{ $product->vendor->name }}</span>
                    </a>

                </div>


                <div class="w-1/2 items-center text-right">
                    <div class="fb-share-button"
                        data-href="{{ $open_graph['url'] }}"
                        data-layout="box_count">
                    </div>
                </div>
            </div>
        </div>
        {{-- สินค้าหมวดเดียวกันlist --}}
        <div class="">
            @include('partials.headbar',[
                'svg' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="fill-current absolute"><path class="heroicon-ui" d="M5 3h4a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5c0-1.1.9-2 2-2zm0 2v4h4V5H5zm10-2h4a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2h-4a2 2 0 0 1-2-2V5c0-1.1.9-2 2-2zm0 2v4h4V5h-4zM5 13h4a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4c0-1.1.9-2 2-2zm0 2v4h4v-4H5zm10-2h4a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2h-4a2 2 0 0 1-2-2v-4c0-1.1.9-2 2-2zm0 2v4h4v-4h-4z"/></svg>',
                'title' => 'สินค้าหมวดเดียวกัน',
                'link' => '/products/category/'.$product->category_id,
                'linktext' => 'แสดงทั้งหมด',
                'target' => '_self'
            ])
            @if(count($products) > 0 )
                @include('products.card',[
                    'showimage' => 0
                ])
                <div class="p-4">
                    {{ $products->links('vendor.pagination.tailwind') }}
                </div>
            @endif
        </div>
        {{-- สินค้าจากร้านเดียวกัน --}}
        <div class="lg:hidden ">
            @include('partials.headbar',[
                'svg' => ' <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current absolute"><path class="heroicon-ui" d="M6.3 12.3l10-10a1 1 0 0 1 1.4 0l4 4a1 1 0 0 1 0 1.4l-10 10a1 1 0 0 1-.7.3H7a1 1 0 0 1-1-1v-4a1 1 0 0 1 .3-.7zM8 16h2.59l9-9L17 4.41l-9 9V16zm10-2a1 1 0 0 1 2 0v6a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6c0-1.1.9-2 2-2h6a1 1 0 0 1 0 2H4v14h14v-6z"/></svg>',
                'title' => 'สินค้าอื่นๆจากผู้ขายนี้',
                'link' => '/vendors/'.$product->vendor_id,
                'linktext' => 'แสดงทั้งหมด',
                'target' => '_self'
            ])
            @include('products.cardvendor',[
                'showimage' => 1
            ])
            <div class="p-4">
                {{ $productvendors->links('vendor.pagination.tailwind') }}
            </div>
        </div>

    </div>

    {{-- //right-side สินค้าจากร้านเดียวกัน--}}
    <div class="hidden  lg:block lg:w-1/3 h-full  ">
        @include('partials.headbar',[
                'svg' => ' <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current absolute"><path class="heroicon-ui" d="M6.3 12.3l10-10a1 1 0 0 1 1.4 0l4 4a1 1 0 0 1 0 1.4l-10 10a1 1 0 0 1-.7.3H7a1 1 0 0 1-1-1v-4a1 1 0 0 1 .3-.7zM8 16h2.59l9-9L17 4.41l-9 9V16zm10-2a1 1 0 0 1 2 0v6a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6c0-1.1.9-2 2-2h6a1 1 0 0 1 0 2H4v14h14v-6z"/></svg>',
                'title' => 'สินค้าจากผู้ขายนี้',
                'link' => '/vendors/'.$product->vendor_id,
                'linktext' => 'แสดงทั้งหมด',
                'target' => '_self'
            ])
        @include('products.cardvendor',[
            'showimage' => 0
        ])
        <div class="p-4">
            {{ $productvendors->links('vendor.pagination.tailwind') }}
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

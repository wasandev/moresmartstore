@extends('layouts.app')
@section('nav')
    @include('partials.nav')
@endsection

@section('search')
    @include('partials.productsearch')
@endsection

@section('content')

{{-- new post list for mobile--}}
<div class="w-max-full mx-auto">
    <div class="flex">
        <div class="max-w-full w-full xl:w-3/4  p-4">

            {{-- product detail --}}
            <div class="w-full lg:max-w-full lg:flex">
                <div class="h-64 lg:h-auto lg:w-1/2 flex-none bg-cover rounded-t  lg:rounded-t-none lg:rounded-l lg:rounded-bl-none lg:border-l lg:border-t lg:border-gray-400 text-center overflow-hidden" style="background:url('{{  Storage::url($product->image) }}') no-repeat center center/cover" title="{{ $product->name }}">
                </div>
                <div class=" lg:w-1/2 border-r  border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded-b-none lg:rounded-t-r p-4 flex flex-1 flex-col justify-between leading-normal">
                    <div class="mb-4">

                        <div class="text-blue-700 font-bold text-xl mb-2">
                            {{ $product->name }}
                        </div>
                        <a href="/products/category/{{$product->category_id}}" class="text-blue-500 text-sm hover:text-blue700">
                            {{$product->category->name}}
                        </a>


                        <p class="text-gray-700 text-base">{{ $product->description }}</p>
                        <p class="w-full py-2 text-sm text-red-600 flex text-center">
                            <span class="text-lg font-semibold">ราคา: {{ number_format($product->price,2) }} บาท/{{$product->unit->name}}</span>
                        </p>
                    </div>

                </div>

            </div>
            <div class=" lg:w-full border-r border-b border-l border-gray-400 lg:border-l-none  lg:border-t-none  lg:border-gray-400 bg-gray-200 rounded-b lg:rounded-b lg:rounded-b-r p-4 flex flex-1 flex-row justify-between leading-normal">

                    <div class=" w-1/3">
                        <a class="text-blue-500 hover:text-blue-700" href="/vendors/{{ $product->vendor->id }}" >
                            {{-- <svg xmlns="http://www.w3.org/2000/svg" class="fill-current absolute" viewBox="0 0 24 24" width="24" height="24"><path class="heroicon-ui" d="M20 11.46V20a2 2 0 0 1-2 2h-3a2 2 0 0 1-2-2v-4h-2v4a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-8.54A4 4 0 0 1 2 8V7a1 1 0 0 1 .1-.45l2-4A1 1 0 0 1 5 2h14a1 1 0 0 1 .9.55l2 4c.06.14.1.3.1.45v1a4 4 0 0 1-2 3.46zM18 12c-1.2 0-2.27-.52-3-1.35a3.99 3.99 0 0 1-6 0A3.99 3.99 0 0 1 6 12v8h3v-4c0-1.1.9-2 2-2h2a2 2 0 0 1 2 2v4h3v-8zm2-4h-4a2 2 0 1 0 4 0zm-6 0h-4a2 2 0 1 0 4 0zM8 8H4a2 2 0 1 0 4 0zm11.38-2l-1-2H5.62l-1 2h14.76z"/></svg> --}}
                            <span class="text-blue-700">{{ $product->vendor->name }}</span>
                        </a>
                    </div>
                    <div class="w-1/3 text-center">
                        <p class="text-gray-600">{{  $product->visits()->count() }} Views</p>
                    </div>

                    <div class="w-1/3  text-right">
                        <div class="fb-share-button" data-href="{{url('/products/{$product->id}')}}" data-layout="button_count" data-size="large">
                            <a target="_blank"
                                href="https://www.facebook.com/sharer/sharer.php?u={{url('/products/{$product->id}')}};src=sdkpreparse"
                                class="fb-xfbml-parse-ignore">
                                แชร์
                            </a>
                        </div>
                    </div>
            </div>
            {{-- สินค้าจากร้านเดียวกัน --}}
            <div class="lg:hidden">
                @include('partials.headbar',[
                    'svg' => ' <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current absolute"><path class="heroicon-ui" d="M6.3 12.3l10-10a1 1 0 0 1 1.4 0l4 4a1 1 0 0 1 0 1.4l-10 10a1 1 0 0 1-.7.3H7a1 1 0 0 1-1-1v-4a1 1 0 0 1 .3-.7zM8 16h2.59l9-9L17 4.41l-9 9V16zm10-2a1 1 0 0 1 2 0v6a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6c0-1.1.9-2 2-2h6a1 1 0 0 1 0 2H4v14h14v-6z"/></svg>',
                    'title' => 'สินค้าอื่นๆจากผู้ขายนี้',
                    'link' => '/vendors/'.$product->vendor_id,
                    'linktext' => 'แสดงทั้งหมด'
                ])
                @include('products.cardvendor',[
                    'showimage' => 1
                ])
                {{ $productvendors->links('vendor.pagination.tailwind') }}
            </div>
            {{-- สิ้นค้าอื่นๆ list --}}

                @include('partials.headbar',[
                    'svg' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="fill-current absolute"><path class="heroicon-ui" d="M5 3h4a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5c0-1.1.9-2 2-2zm0 2v4h4V5H5zm10-2h4a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2h-4a2 2 0 0 1-2-2V5c0-1.1.9-2 2-2zm0 2v4h4V5h-4zM5 13h4a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4c0-1.1.9-2 2-2zm0 2v4h4v-4H5zm10-2h4a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2h-4a2 2 0 0 1-2-2v-4c0-1.1.9-2 2-2zm0 2v4h4v-4h-4z"/></svg>',
                    'title' => 'สินค้าหมวดเดียวกัน',
                    'link' => '/products/category/'.$product->category_id,
                    'linktext' => 'แสดงทั้งหมด'
                ])
             @if(count($products) > 0 )
                @include('products.card',[
                    'showimage' => 1
                ])
                <div class="p-4">
                 {{ $products->links('vendor.pagination.tailwind') }}
                </div>
            @endif

        </div>

        {{-- //right-side สินค้าจากร้านเดียวกัน--}}
        <div class="hidden  lg:block lg:w-1/4 h-full  ">
            @include('partials.headbar',[
                    'svg' => ' <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current absolute"><path class="heroicon-ui" d="M6.3 12.3l10-10a1 1 0 0 1 1.4 0l4 4a1 1 0 0 1 0 1.4l-10 10a1 1 0 0 1-.7.3H7a1 1 0 0 1-1-1v-4a1 1 0 0 1 .3-.7zM8 16h2.59l9-9L17 4.41l-9 9V16zm10-2a1 1 0 0 1 2 0v6a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6c0-1.1.9-2 2-2h6a1 1 0 0 1 0 2H4v14h14v-6z"/></svg>',
                    'title' => 'สินค้าจากผู้ขายนี้',
                    'link' => '/vendors/'.$product->vendor_id,
                    'linktext' => 'แสดงทั้งหมด'
                ])
            @include('products.cardvendor',[
                'showimage' => 1
            ])
            <div class="p-4">
                {{ $productvendors->links('vendor.pagination.tailwind') }}
            </div>
        </div>

    </div>
</div>


@endsection

@section('footer')
    @include('partials.footer')

@endsection

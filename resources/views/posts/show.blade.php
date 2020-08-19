@extends('layouts.app')
@section('nav')
    @include('partials.nav')
@endsection

@section('search')
    @include('partials.postsearch')
@endsection
@section('mstorehome')
    @include('partials.mstorehome')
@endsection

@section('content')

<div id="app" class="max-w-full  mx-auto  flex">

    {{-- post detail --}}
        <div class="w-full  lg:w-2/3 mx-auto flex flex-col rounded-lg mt-2 ">
            <div class="p-2">
                {{-- <div class="aspect-16x9 rounded-t-lg  overflow-hidden" style="background:url('{{  Storage::url($post->post_image) }}') no-repeat center center/cover" title="{{ $post->title }}">
                </div> --}}
                <div class="flex items-center justify-center rounded-t">
                    @if (!@empty($post->post_image))
                    <img class="h-full w-full object-cover" src="{{  Storage::url($post->post_image) }}" alt="{{$post->title}}">
                    @else
                            <img class="h-full w-full object-cover lg:rounded-tl rounded-t lg:rounded-tr-none" src="{{  Storage::url('store.jpg')}}" alt="{{$post->title}}">
                    @endif

                </div>
                <div class="bg-white rounded-b-none lg:rounded-t-r  p-2 flex  flex-col justify-between leading-normal">

                        <div class="text-blue-700  mb-2 rounded-full">
                            <h1 class="font-bold text-xl">{{ $post->title }}</h1>
                            <svg xmlns="http://www.w3.org/2000/svg" class="fill-current absolute" viewBox="0 0 24 24" width="24" height="24"><path class="heroicon-ui" d="M17.56 17.66a8 8 0 0 1-11.32 0L1.3 12.7a1 1 0 0 1 0-1.42l4.95-4.95a8 8 0 0 1 11.32 0l4.95 4.95a1 1 0 0 1 0 1.42l-4.95 4.95zm-9.9-1.42a6 6 0 0 0 8.48 0L20.38 12l-4.24-4.24a6 6 0 0 0-8.48 0L3.4 12l4.25 4.24zM11.9 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0-2a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/></svg>
                            <span class="pl-8 py-2">การดู:{{  $post->visits()->count() }} ครั้ง </span>

                        </div>
                        <p class="text-gray-700 text-base">{{ $post->content }}</p>

                </div>


                <div class="p-2 flex flex-row justify-between leading-normal border-t border-gray-300 bg-white">

                        <div class="mr-4 w-1/2">
                            <a class="flex text-blue-500 hover:text-blue-700 items-center" href="/vendors/{{ $post->vendor->id }}" >
                                <img class="w-10 h-10 rounded-full mr-2" src="{{  Storage::url($post->vendor->logofile) }}" alt="{{ $post->vendor->name }}">
                                <span class="text-blue-700 "> {{ $post->vendor->name }}</span>
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
            {{-- post list --}}
            <div class="lg:hidden">
                @include('partials.headbar',[
                        'svg' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="fill-current absolute"><path class="heroicon-ui" d="M5 3h4a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5c0-1.1.9-2 2-2zm0 2v4h4V5H5zm10-2h4a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2h-4a2 2 0 0 1-2-2V5c0-1.1.9-2 2-2zm0 2v4h4V5h-4zM5 13h4a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4c0-1.1.9-2 2-2zm0 2v4h4v-4H5zm10-2h4a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2h-4a2 2 0 0 1-2-2v-4c0-1.1.9-2 2-2zm0 2v4h4v-4h-4z"/></svg>',
                        'title' => 'โพสอื่นๆ',
                        'link' => '/post',
                        'linktext' => 'แสดงทั้งหมด',
                        'target' => '_self'
                    ])
                @if(count($posts) > 0 )
                    @include('posts.cardvendor',[
                        'showimage' => 0
                    ])
                    <div class="p-2">
                    {{ $posts->links('vendor.pagination.tailwind') }}
                    </div>
                 @endif
            </div>
        </div>
        {{-- Side-bar --}}
        @if(count($posts) > 0 )
            <div class="hidden  lg:block lg:w-1/3 ">
                @include('partials.headbar',[
                            'svg' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="fill-current absolute"><path class="heroicon-ui" d="M5 3h4a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5c0-1.1.9-2 2-2zm0 2v4h4V5H5zm10-2h4a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2h-4a2 2 0 0 1-2-2V5c0-1.1.9-2 2-2zm0 2v4h4V5h-4zM5 13h4a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4c0-1.1.9-2 2-2zm0 2v4h4v-4H5zm10-2h4a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2h-4a2 2 0 0 1-2-2v-4c0-1.1.9-2 2-2zm0 2v4h4v-4h-4z"/></svg>',
                            'title' => 'โพสอื่นๆ',
                            'link' => '/post',
                            'linktext' => 'แสดงทั้งหมด',
                            'target' => '_self'
                        ])

                        @include('posts.cardsidebar',[
                            'showimage' => 0
                        ])
                    <div class="p-4">
                        {{ $posts->links('vendor.pagination.tailwind') }}
                    </div>

            </div>
        @endif

</div>
@include('partials.googleads1')
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

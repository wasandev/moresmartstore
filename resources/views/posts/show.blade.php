@extends('layouts.app')
@section('nav')
    @include('partials.nav')
@endsection

@section('search')
    @include('partials.postsearch')
@endsection

@section('content')

<div id="app" class="w-max-full mx-auto p-4">

    {{-- post detail --}}
    <div class="w-full lg:max-w-full lg:flex">
        <div class="h-48 lg:h-64 lg:w-1/2 flex-none bg-cover rounded-t  lg:rounded-t-l lg:border-l lg:border-t lg:border-gray-400 text-center overflow-hidden" style="background:url('{{  Storage::url($post->post_image) }}') no-repeat center center/cover" title="{{ $post->title }}">
        </div>
        <div class=" lg:w-1/2 border-r  border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded-b-none lg:rounded-t-r p-4 flex flex-1 flex-col justify-between leading-normal">
            <div class="mb-4">

                <div class="text-blue-700 font-bold text-xl mb-2">
                    {{ $post->title }}
                </div>


                <p class="text-gray-700 text-base">{!! $post->content !!}</p>

            </div>

        </div>

    </div>
    <div class=" lg:w-full border-r border-b border-l border-gray-400 lg:border-l-none  lg:border-t-none  lg:border-gray-400 bg-gray-200 rounded-b lg:rounded-b lg:rounded-b-r p-4 flex flex-1 flex-row justify-between leading-normal">

            <div class="mr-4 w-2/4">
                <a class="text-blue-500 hover:text-blue-700" href="/vendors/{{ $post->vendor->id }}" >
                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-current absolute" viewBox="0 0 24 24" width="24" height="24"><path class="heroicon-ui" d="M20 11.46V20a2 2 0 0 1-2 2h-3a2 2 0 0 1-2-2v-4h-2v4a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-8.54A4 4 0 0 1 2 8V7a1 1 0 0 1 .1-.45l2-4A1 1 0 0 1 5 2h14a1 1 0 0 1 .9.55l2 4c.06.14.1.3.1.45v1a4 4 0 0 1-2 3.46zM18 12c-1.2 0-2.27-.52-3-1.35a3.99 3.99 0 0 1-6 0A3.99 3.99 0 0 1 6 12v8h3v-4c0-1.1.9-2 2-2h2a2 2 0 0 1 2 2v4h3v-8zm2-4h-4a2 2 0 1 0 4 0zm-6 0h-4a2 2 0 1 0 4 0zM8 8H4a2 2 0 1 0 4 0zm11.38-2l-1-2H5.62l-1 2h14.76z"/></svg>
                    <span class="text-blue-700 pl-6">ติดต่อธุรกิจเจ้าของโพส {{ $post->vendor->name }}</span>
                </a>
            </div>
            <div class="mr-4 w-1/4 text-center">
                <p class="text-gray-600">({{  $post->visits()->count() }} View)</p>
            </div>

            <div class="w-1/4  text-right">
                <div class="fb-share-button" data-href="{{url('/posts/{$post->slug}')}}" data-layout="button_count" data-size="large">
                    <a target="_blank"
                        href="https://www.facebook.com/sharer/sharer.php?u={{url('/posts/{$post->id}')}};src=sdkpreparse"
                        class="fb-xfbml-parse-ignore">
                        แชร์
                    </a>
                </div>
            </div>
    </div>

    {{-- post list --}}
    @include('partials.headbar',[
            'svg' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="fill-current absolute"><path class="heroicon-ui" d="M5 3h4a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5c0-1.1.9-2 2-2zm0 2v4h4V5H5zm10-2h4a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2h-4a2 2 0 0 1-2-2V5c0-1.1.9-2 2-2zm0 2v4h4V5h-4zM5 13h4a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4c0-1.1.9-2 2-2zm0 2v4h4v-4H5zm10-2h4a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2h-4a2 2 0 0 1-2-2v-4c0-1.1.9-2 2-2zm0 2v4h4v-4h-4z"/></svg>',
            'title' => 'โพสอื่นๆของธุรกิจนี้',
            'link' => '/post',
            'linktext' => 'แสดงทั้งหมด',
            'target' => '_self'
        ])
        @if(count($postvendors) > 0 )
        @include('posts.cardvendor',[
            'showimage' => 1
        ])
            {{ $postvendors->links('vendor.pagination.tailwind') }}
    @endif
</div>


@endsection

@section('footer')
    @include('partials.footer')

@endsection

@extends('layouts.app')
@section('nav')
    @include('partials.nav')
@endsection

@section('search')
    @include('partials.blogsearch')
@endsection
@section('mstorehome')
    @include('partials.mstorehome')
@endsection


@section('content')

<div id="app" class="max-w-full  mx-auto  flex">
    {{-- blog detail --}}
    <div class="w-full  lg:w-2/3 mx-auto flex flex-col  rounded-lg mt-2">
        <div class="p-2">
            {{-- <div class="aspect-16x9 rounded-t-lg  overflow-hidden" style="background:url('{{  Storage::url($blog->blog_image) }}') no-repeat center center/cover" title="{{ $blog->title }}">
            </div> --}}
            <div class="flex items-center justify-center">
                <img class="h-auto w-full object-cover rounded-t" src="{{  Storage::url($blog->blog_image) }}" alt="{{$blog->title}}">
            </div>
            <div class="bg-white px-2">
                <h1 class="font-bold text-xl py-2 text-blue-500">{{ $blog->title }}</h1>

                <p class="text-gray-700 mt-2 py-2">{!! $blog->blog_content !!}</p>
                <p class="text-sm"> วันที่เผยแพร่: {{formatDateThai( $blog->published_at )}}</p>

            </div>


            <div class="p-4 flex flex-row justify-between leading-normal border-t border-gray-300 bg-white">

                    <div class=" w-1/2">
                         <svg xmlns="http://www.w3.org/2000/svg" class="fill-current absolute" viewBox="0 0 24 24" width="24" height="24"><path class="heroicon-ui" d="M17.56 17.66a8 8 0 0 1-11.32 0L1.3 12.7a1 1 0 0 1 0-1.42l4.95-4.95a8 8 0 0 1 11.32 0l4.95 4.95a1 1 0 0 1 0 1.42l-4.95 4.95zm-9.9-1.42a6 6 0 0 0 8.48 0L20.38 12l-4.24-4.24a6 6 0 0 0-8.48 0L3.4 12l4.25 4.24zM11.9 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0-2a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/></svg>

                        <span class="pl-8 py-2 text-sm">{{  $blog->visits()->count() }} </span>

                    </div>

                    <div class="w-1/2 items-center text-right">
                        <div class="fb-share-button"
                            data-href="{{ $open_graph['url'] }}"
                            data-layout="box_count">
                        </div>
                    </div>
            </div>
        </div>
        {{-- blog list --}}
        <div class="lg:hidden bg-gray-200">
            @include('partials.headbar',[
                    'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" class="fill-current absolute"><path d="M16 2h4v15a3 3 0 0 1-3 3H3a3 3 0 0 1-3-3V0h16v2zm0 2v13a1 1 0 0 0 1 1 1 1 0 0 0 1-1V4h-2zM2 2v15a1 1 0 0 0 1 1h11.17a2.98 2.98 0 0 1-.17-1V2H2zm2 8h8v2H4v-2zm0 4h8v2H4v-2zM4 4h8v4H4V4z"/></svg>',
                    'title' => 'ข่าว/บทความอื่นๆ',
                    'link' => '/blogs',
                    'linktext' => 'แสดงทั้งหมด',
                    'target' => '_self'
                ])
            @if(count($blogs) > 0 )
                @include('blogs.card',[
                    'showimage' => 1
                ])
                <div class="p-2">
                {{ $blogs->links('vendor.pagination.tailwind') }}
                </div>
                @endif
        </div>
    </div>
    {{-- Side-bar --}}
    <div class="hidden  lg:block lg:w-1/3 ">
        @include('partials.headbar',[
                    'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" class="fill-current absolute"><path d="M16 2h4v15a3 3 0 0 1-3 3H3a3 3 0 0 1-3-3V0h16v2zm0 2v13a1 1 0 0 0 1 1 1 1 0 0 0 1-1V4h-2zM2 2v15a1 1 0 0 0 1 1h11.17a2.98 2.98 0 0 1-.17-1V2H2zm2 8h8v2H4v-2zm0 4h8v2H4v-2zM4 4h8v4H4V4z"/></svg>',
                    'title' => 'ข่าว/บทความอื่นๆ',
                    'link' => '/blogs',
                    'linktext' => 'แสดงทั้งหมด',
                    'target' => '_self'
                ])
            @if(count($blogs) > 0 )
                @include('blogs.cardsidebar',[
                    'showimage' => 1
                ])
            <div class="p-4">
                {{ $blogs->links('vendor.pagination.tailwind') }}
            </div>
            @endif
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

@extends('layouts.app')
@section('nav')
    @include('partials.nav')
@endsection

@section('search')
    @include('partials.blogsearch')
@endsection


@section('content')

<div class="max-w-xl mx-auto p-4">

        @include('partials.headbar',[
                        'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" class="fill-current absolute"><path d="M16 2h4v15a3 3 0 0 1-3 3H3a3 3 0 0 1-3-3V0h16v2zm0 2v13a1 1 0 0 0 1 1 1 1 0 0 0 1-1V4h-2zM2 2v15a1 1 0 0 0 1 1h11.17a2.98 2.98 0 0 1-.17-1V2H2zm2 8h8v2H4v-2zm0 4h8v2H4v-2zM4 4h8v4H4V4z"/></svg>',
                        'title' => 'บทความ',
                        'link' => '/blogs',
                        'linktext' => 'แสดงทั้งหมด',
                        'target' => '_self'
                    ])
        <div class="w-full p-4">
            <div class="aspect-16x9 rounded-t-lg" style="background:url('{{  Storage::url($blog->blog_image) }}') no-repeat center center/cover" title="{{ $blog->title }}">
            </div>
            {{-- blog detail --}}
            <div class="w-full ">


                <div class="bg-white p-4 justify-between leading-normal">
                    <div class="mb-4">

                        <div class=" mb-2">
                            <p class="text-blue-700 font-bold text-xl">{{ $blog->title }}</p>
                            <p class="text-sm">วันที่เผยแพร่ : {{formatDateThai( $blog->published_at )}}</p>

                        </div>

                        <p class="text-gray-700 text-base">{{ $blog->blog_content }}</p>

                    </div>

                </div>

            </div>
            <div class="lg:w-full  bg-gray-200  p-4 flex flex-1 flex-row justify-between leading-normal">


                    <div class="mr-4 w-1/2 text-left">
                        <p class="text-gray-600">การดู {{  $blog->visits()->count() }} ครั้ง</p>
                    </div>

                    <div class="w-1/2  text-right">
                        <div class="fb-share-button" data-href="{{url('/blogs/{$blog->slug}')}}" data-layout="button_count" data-size="large">
                            <a target="_blank"
                                href="https://www.facebook.com/sharer/sharer.php?u={{url('/blogs/{$blog->id}')}};src=sdkpreparse"
                                class="fb-xfbml-parse-ignore">
                                แชร์
                            </a>
                        </div>
                    </div>
            </div>
    </div>

</div>


@endsection

@section('footer')
    @include('partials.footer')

@endsection

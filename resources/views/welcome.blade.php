@extends('layouts.app')
@section('nav')
    @include('partials.nav')
@endsection

@section('search')
    @include('partials.search')
@endsection

@section('mstorehome')
    @include('partials.mstorehome')
@endsection



@section('businesstype')
    @include('partials.businesstype')
@endsection



@section('content')
<div id="app" class=" max-w-full mx-auto">

    <div class="flex mx-4">
            @if ( count($products) > 0 )
                <div class="w-full mx-auto  xl:w-3/5">
            @else
                <div class="w-full mx-auto  xl:w-full">
            @endif
            @if (count($blogs) > 0 )
            {{--  Blogs --}}
            <div class="w-full mx-auto rounded-lg ">

                @include('partials.headbar',[
                    'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" class="fill-current absolute"><path d="M16 2h4v15a3 3 0 0 1-3 3H3a3 3 0 0 1-3-3V0h16v2zm0 2v13a1 1 0 0 0 1 1 1 1 0 0 0 1-1V4h-2zM2 2v15a1 1 0 0 0 1 1h11.17a2.98 2.98 0 0 1-.17-1V2H2zm2 8h8v2H4v-2zm0 4h8v2H4v-2zM4 4h8v4H4V4z"/></svg>',
                    'title' => 'บทความ',
                    'link' => '/blogs',
                    'linktext' => 'แสดงทั้งหมด',
                    'target' => '_self'
                ])

                @include('blogs.card')


            </div>
        @endif
            {{--vendor --}}
            @if (count($vendors) > 0 )


            @include('partials.headbar',[
                'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" class="fill-current absolute"><path d="M2 2c0-1.1.9-2 2-2h12a2 2 0 0 1 2 2v18l-8-4-8 4V2z"/></svg>',
                'title' => 'ธุรกิจ',
                'link' => '/vendors',
                'linktext' => 'แสดงทั้งหมด',
                'target' => '_self'
            ])

            @include('vendors.card',[
                'showimage' => 1
            ])
            @endif

            {{--  Product --}}
            @if (count($products) > 0 )

                <div class="xl:hidden">
                @include('partials.headbar',[
                        'svg' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="fill-current absolute"><path class="heroicon-ui" d="M5 3h4a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5c0-1.1.9-2 2-2zm0 2v4h4V5H5zm10-2h4a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2h-4a2 2 0 0 1-2-2V5c0-1.1.9-2 2-2zm0 2v4h4V5h-4zM5 13h4a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4c0-1.1.9-2 2-2zm0 2v4h4v-4H5zm10-2h4a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2h-4a2 2 0 0 1-2-2v-4c0-1.1.9-2 2-2zm0 2v4h4v-4h-4z"/></svg>',
                        'title' => 'สินค้า/บริการ',
                        'link' => '/products',
                        'linktext' => 'แสดงทั้งหมด',
                        'target' => '_self'
                    ])
                @include('products.card',[
                    'showimage' => 1
                ])
                </div>
            @endif
            @if (count($posts) > 0 )
                {{--post --}}
                <div class="w-full mx-auto rounded-lg ">
                    @include('partials.headbar',[
                        'svg' => ' <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current absolute"><path class="heroicon-ui" d="M6.3 12.3l10-10a1 1 0 0 1 1.4 0l4 4a1 1 0 0 1 0 1.4l-10 10a1 1 0 0 1-.7.3H7a1 1 0 0 1-1-1v-4a1 1 0 0 1 .3-.7zM8 16h2.59l9-9L17 4.41l-9 9V16zm10-2a1 1 0 0 1 2 0v6a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6c0-1.1.9-2 2-2h6a1 1 0 0 1 0 2H4v14h14v-6z"/></svg>',
                        'title' => 'โพสโฆษณา',
                        'link' => '/post',
                        'linktext' => 'แสดงทั้งหมด',
                        'target' => '_self'
                    ])
                    @include('posts.card',[
                        'showimage' => 1
                    ])
                </div>
            @endif

        </div>
        {{-- //right-side --}}

        @if ( count($products) > 0 )
             <div class="hidden  xl:block xl:w-2/5 h-full  ">

            @include('partials.headbar',[
                    'svg' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="fill-current absolute"><path class="heroicon-ui" d="M5 3h4a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5c0-1.1.9-2 2-2zm0 2v4h4V5H5zm10-2h4a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2h-4a2 2 0 0 1-2-2V5c0-1.1.9-2 2-2zm0 2v4h4V5h-4zM5 13h4a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4c0-1.1.9-2 2-2zm0 2v4h4v-4H5zm10-2h4a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2h-4a2 2 0 0 1-2-2v-4c0-1.1.9-2 2-2zm0 2v4h4v-4h-4z"/></svg>',
                    'title' => 'สินค้า/บริการ',
                    'link' => '/products',
                    'linktext' => 'แสดงทั้งหมด',
                    'target' => '_self'
                ])
            @include('products.cardsidebar',[
                'showimage' => 1
            ])

            </div>
        @endif

    </div>
</div>


@endsection

@section('footer')
    @include('partials.footer')

@endsection

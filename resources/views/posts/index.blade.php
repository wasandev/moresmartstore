@extends('layouts.app')
@section('nav')
    @include('partials.nav')
@endsection

@section('search')
    @include('partials.search')
@endsection


@section('content')

{{-- new post list for mobile--}}
<div class="w-max-full mx-auto ">
    <div class="flex">
        <div class="max-w-full w-full xl:w-3/4">
            {{--post --}}
            <div class="xl:hidden">

               {{-- Google Adsense --}}
               <p class="text-black"> Google Adsense</p>

            </div>
            {{-- post list --}}
            <div class="w-full xl:mx-0 rounded-lg">
                <div class="mx-2 mb-6">
                    <div class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-4 lg:grid-cols-4 xl:grid-cols-4 gap-1  ">

                        @foreach ($posts as $post)

                            <a href="/post/{{ $post->slug }}" class=" flex flex-col flex-1 bg-white rounded shadow hover:shadow-lg translateY-2px m-4 p-2 no-underline transition">
                                 <div class="aspect-16x9 rounded"
                                    style="background:url('{{  Storage::url($post->post_image) }}') no-repeat center center/cover">
                                </div>
                                <div class="flex flex-col flex-1 bg-white  rounded-b-lg subpixel-antialiased">
                                    <p class=" mb-2 text-blue-500 text-sm font-semibold text-left">{{ $post->title }} </p>

                                    <div class="text-left text-sm font-thin flex-1">
                                        <p> {{Str::of( $post->content)->limit(100) }} </p>
                                    </div>
                                    <div class="w-full  flex  flex-row border-t-2 text-sm font-thin ">

                                        <div class="text-left w-1/2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="fill-current absolute" viewBox="0 0 24 24" width="24" height="24"><path class="heroicon-ui" d="M17.56 17.66a8 8 0 0 1-11.32 0L1.3 12.7a1 1 0 0 1 0-1.42l4.95-4.95a8 8 0 0 1 11.32 0l4.95 4.95a1 1 0 0 1 0 1.42l-4.95 4.95zm-9.9-1.42a6 6 0 0 0 8.48 0L20.38 12l-4.24-4.24a6 6 0 0 0-8.48 0L3.4 12l4.25 4.24zM11.9 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0-2a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/></svg>
                                            <span class="pl-8 py-2">{{  $post->visits()->count() }} </span>
                                        </div>

                                        <div class="text-right w-1/2">{{ $post->vendor->name }}</div>
                                    </div>
                                </div>
                            </a>

                        @endforeach

                    </div>
                    {{ $posts->links('vendor.pagination.tailwind') }}
                </div>
            </div>


        </div>
        {{-- //right-side --}}
        <div class="hidden  xl:block xl:w-1/4 h-full  p-4">

            <div class="flex flex-col justify-between overflow-y-auto sticky top-0   ">
               {{-- google adsense --}}
               <p class="text-black"> Google Adsense</p>
            </div>
        </div>
    </div>
</div>


@endsection

@section('footer')
    @include('partials.footer')

@endsection

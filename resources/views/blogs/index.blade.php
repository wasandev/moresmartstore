@extends('layouts.app')
@section('nav')
    @include('partials.nav')
@endsection

@section('search')
    @include('partials.search')
@endsection


@section('content')

{{-- new post list for mobile--}}
<div class="w-max-full mx-auto">
    <div class="flex">
        <div class="max-w-full w-full xl:w-3/4">
            {{--post --}}
            <div class="xl:hidden">

               {{-- Google Adsense --}}
               <p class="text-black"> Google Adsense</p>

            </div>
            {{-- post list --}}
            <div class="w-full xl:mx-0 rounded-lg">
                <div class="mx-4">
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-2  ">

                        @foreach ($blogs as $blog)
                            <div class="w-full  flex flex-col ">
                            <a href="/blog/{{ $blog->slug }}" class=" flex flex-col flex-1 bg-white rounded shadow hover:shadow-lg translateY-2px m-4 p-2 no-underline transition">
                                <div class="aspect-16x9 rounded"
                                        style="background:url('{{  Storage::url($blog->blog_image) }}') no-repeat center center/cover">
                                    </div>
                                    <p class="mb-2 text-grey-900 text-sm font-semibold text-left">{{ $blog->title }} </p>

                                    <div class="p-2 flex flex-col flex-1 bg-white  rounded-b-lg subpixel-antialiased">

                                        <div class="mb-3 w-full mx-auto text-left text-sm font-thin ">
                                            <p> {{Str::of( $blog->blog_content)->limit(50) }} </p>
                                            <p class="text-blue-500">ดูข้อมูลเพิ่มเติม</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>


        </div>
        {{-- //right-side --}}
        <div class="hidden  xl:block xl:w-1/4 h-full bg-white">

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
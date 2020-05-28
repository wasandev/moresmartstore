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
        <div class="max-w-full w-full xl:w-3/4 p-4">
            {{--post --}}
            <div class="xl:hidden m-4">
               {{-- Google Adsense --}}
               <p class="text-black"> Google Adsense</p>

            </div>
            {{-- post list --}}
            <div class="w-full mx-auto">
                <div class="mx-4">

                    <div class="aspect-16x9 rounded" style="background:url('{{  Storage::url($post->post_image) }}') no-repeat center center/cover">
                    </div>
                    <p class="mb-2 text-grey-900 text-sm font-semibold text-left">{{ $post->title }} </p>
                    <p>{{ $post->content }}</p>
                    <p>{{ $post->visits()->count() }}</p>
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

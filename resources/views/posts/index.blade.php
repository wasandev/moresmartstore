@extends('layouts.app')
@section('nav')
    @include('partials.nav')
@endsection

@section('search')
    @include('partials.postsearch')
@endsection



@section('content')

{{-- new post list for mobile--}}
<div id="app"  class="max-w-full mx-auto sm:justify-between sm:items-center  sm:py-3">
    @if (!empty(  $query ))
        <p class="px-2"> ผลการค้นหา <b> {{ $query }} </b> :
            <a href="/post" class="text-blue-500 hover:text-blue-700">แสดงทั้งหมด</a>
        </p>
    @endif
    @if(isset($posts))
        @include('posts.card',[
            'showimage' => 0
        ])
        <div class="p-4">
            {{ $posts->links('vendor.pagination.tailwind') }}
        </div>
    @elseif(isset($message))
        <p class="text-red-500">{{ $message }}</p>
        <a href="/post" class="text-blue-500 hover:text-blue-700">แสดงทั้งหมด</a>
    @endif
    @include('partials.googleads1')
@endsection

@section('footer')
    @include('partials.footer')

@endsection

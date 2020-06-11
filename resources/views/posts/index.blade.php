@extends('layouts.app')
@section('nav')
    @include('partials.nav')
@endsection

@section('search')
    @include('partials.postsearch')
@endsection


@section('content')

{{-- new post list for mobile--}}
<div class="w-max-full mx-auto ">
    {{-- post list --}}
    @include('posts.card',[
        'showimage' => 1
    ])

</div>
<div class="p-4">
    {{ $posts->links('vendor.pagination.tailwind') }}
</div>


@endsection

@section('footer')
    @include('partials.footer')

@endsection

@extends('layouts.app')
@section('nav')
    @include('partials.nav')
@endsection

@section('search')
    @include('partials.blogsearch')
@endsection

@section('content')

{{-- new post list for mobile--}}
<div id="app" class="lg:max-w-full w-full mx-auto">

        <div class="w-full">

            {{-- blog list --}}
            @if(isset($blogs))
                @include('blogs.card')
                <div class="p-4 ">
                    {{ $blogs->links('vendor.pagination.tailwind') }}
                </div>
            @elseif(isset($message))
                <p>{{ $message }}</p>
            @endif


        </div>

</div>

@endsection

@section('footer')
    @include('partials.footer')

@endsection

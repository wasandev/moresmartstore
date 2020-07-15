@extends('layouts.app')
@section('nav')
    @include('partials.nav')
@endsection

{{-- @section('search')
    @include('partials.search')
@endsection --}}

@section('content')
    <div id="app" class="w-full max-w-md mx-auto mt-20 ">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h1 class="text-xl font-semibold px-2">{{ $thread->subject }}</h1>
            <div id="thread_{{ $thread->id }}">
                @each('messenger.partials.messages', $thread->messages, 'message')
            </div>

            @include('messenger.partials.form-message')
        </div>
    </div>

@stop

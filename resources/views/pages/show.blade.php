@extends('layouts.app')

@section('nav')
    @include('partials.nav')
@endsection

@section('search')
    @include('partials.search')
@endsection

{{-- @section('mstorehome')
    @include('partials.mstorehome')
@endsection --}}

@section('content')

<div id="app"  class="max-w-full  mx-auto sm:justify-between sm:items-center  sm:py-3 bg-white">
    <div class="">
        @include('pages.content')
    </div>
</div>
@endsection
@section('footer')
    @include('partials.footer')

@endsection

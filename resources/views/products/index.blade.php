@extends('layouts.app')
@section('nav')
    @include('partials.nav')
@endsection


@section('content')
<div id="app">
    <div class="max-w-full mx-auto bg-gray-400 pt-16">
     <searchbar></searchbar>
    </div>
    <div class="max-w-full mx-auto  space-y-0 p-4 pt-16">
    <products></products>
    {{-- <router-view class="bg-gray-100"></router-view> --}}
    </div>


</div>
@endsection

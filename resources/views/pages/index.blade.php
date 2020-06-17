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

@section('content')
    <!--Title-->
    <!--image-->
    {{-- <div class="container max-w-full mx-auto bg-white bg-cover mt-0"  style="background-image:url('{{  Storage::url('mshome6.jpg') }}'); height: 50vh;">
        <div class="max-w-2xl mx-auto p-2 md:p-2  leading-normal text-center ">
            <h1 class="mt-32 text-3xl font-extrabold text-black  leading-tight">
                {{$page->title}}
            </h1>
        </div>
    </div> --}}

    <!--Container-->
	<div class="container max-w-2xl mx-auto  p-4 ">

		<div class="mx-auto">

			<div class="p-4 bg-gray w-full mr-20 border rounded-t-lg  text-sm md:text-base text-gray-700 leading-normal" >

				<p class="w-full  text-center rounded-t-lg text-2xl md:text-3xl text-gray-200 bg-blue-400">
					 {{ $page->title }}
				</p>

                <p class=" leading-tight">
                    {!! $page->page_content !!}
                </p>
                <p class="mt-6 py-2 border-t ">ปรับปรุงล่าสุด :  {{ $page->updated_at->format('d F Y') }}
            </div>
        </div>
	</div>


@endsection
@section('footer')
    @include('partials.footer')

@endsection

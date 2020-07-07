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


    <!--Container-->
	<div class="container max-w-2xl mx-auto  p-4 ">

		<div class="mx-auto">
            <img class="w-64 mx-auto  mb-4  "  src="{{ Storage::url($page->page_image) }}"  title="{{ $page->title }}">

			<div class="p-4 bg-gray w-full mr-20 border rounded-t-lg  text-sm md:text-base text-gray-700 leading-normal" >


				<p class="w-full   text-center rounded-full text-2xl md:text-3xl text-gray-200 bg-blue-400">
					 {{ $page->title }}
				</p>

                <p class=" leading-tight p-4">
                    {!! $page->page_content !!}
                </p>
                <div class="mt-6 py-2 border-t flex">
                    <p class="text-left w-1/2">ปรับปรุงล่าสุด :  {{ formatDateThai($page->updated_at) }}</p>
                    <p class="text-right w-1/2">Moresmartstore.com</p>
                </div>
            </div>
        </div>
	</div>


@endsection
@section('footer')
    @include('partials.footer')

@endsection

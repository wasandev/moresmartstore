@extends('layouts.app')

@section('nav')
    @include('partials.nav')
@endsection


@section('content')
    <!--Title-->
    <!--image-->
    <div class="container max-w-full mx-auto bg-white bg-cover mt-0"  style="background-image:url('{{  Storage::url('mshome2.jpg') }}'); height: 50vh;">
        <div class="max-w-2xl mx-auto p-2 md:p-2  leading-normal text-center">
            <h1 class="mt-20 text-2xl font-semibold text-black  leading-tight">
                {{$page->title}}
            </h1>
        </div>
    </div>

    <!--Container-->
	<div class="container max-w-2xl mx-auto -mt-20 ">

		<div class="mx-0 sm:mx-6">

			<div class="bg-white w-full mr-20 border rounded-t-lg p-4 md:p-12 text-lg md:text-2lg text-grey-darkest leading-normal" >


				<p class="text-2xl md:text-3xl mb-5">

					 {{ $page->title }}
				</p>

                <p class="py-4">
                    {!! $page->page_content !!}
                </p>


            </div>
        </div>
	</div>


@endsection
@section('footer')
    @include('partials.footer')

@endsection

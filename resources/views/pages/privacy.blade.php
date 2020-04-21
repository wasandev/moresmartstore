@extends('layouts.app')

@section('nav')
    @include('partials.nav')
@endsection


@section('content')
    <!--Title-->
    <!--image-->
    <div class="container max-w-full max-w-full mx-auto bg-white bg-cover mt-0"  style="background-image:url('{{  Storage::url('mshome4.jpg') }}'); height: 50vh;">
        <div class="max-w-2xl mx-auto p-2 md:p-2  leading-normal text-center">
            <h1 class="mt-20 text-2xl font-semibold text-black sm:text-4xl md:text-5xl xl:text-4xl leading-tight">
                Privacy
            </h1>
        </div>
    </div>

    <!--Container-->
	<div class="container max-w-2xl mx-auto -mt-20 ">

		<div class="mx-0 sm:mx-6">

			<div class="bg-white w-full mr-20 border rounded-t-lg p-4 md:p-12 text-lg md:text-2lg text-grey-darkest leading-normal" >


				<p class="text-2xl md:text-3xl mb-5">

					 {{ __('Privacy') }}
				</p>

                <p class="py-4">The basic blog page layout is available and all using the default Tailwind CSS classes (although there are a few hardcoded style tags). If you are going to use this in your project, you will want to convert the classes into components.</p>

                <p class="py-4">The basic blog page layout is available and all using the default Tailwind CSS classes (although there are a few hardcoded style tags). If you are going to use this in your project, you will want to convert the classes into components.</p>


            </div>
        </div>
	</div>


@endsection
@section('footer')
    @include('partials.footer')

@endsection

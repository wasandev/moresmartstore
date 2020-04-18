@extends('layouts.app')

@section('nav')
@include('partials.nav')
@endsection

@section('content')
<!--image-->
<div class="w-full max-w-4xl mx-auto bg-white bg-cover "
    style="background-image:url('{{  Storage::url('gotashome.jpg') }}'); height: 80vh;">

</div>
<div class="max-w-3xl mx-auto mt-auto py-4">
    <div class="mx-0 sm:mx-6">
        <div class="bg-blue bg-transparent w-full p-4 md:p-4 t text-white leading-normal rounded-lg"
            style="opacity: .75;">
            <p class="text-2xl md:text-3xl text-center ">
                GOTAS Dashboard

            </p>
            <p class="py-2 text-base text-white text-center mt-4">
                สำหรับ : {{ $company }}
            </p>
        </div>
    </div>
</div>


<div class="flex flex-wrap max-w-3xl mx-auto my-4">

    <div class="w-full md:w-1/2 lg:w-1/3 flex flex-col m-6">
        <a href="{{ 'http://'.$fqdn }}/app" target="_blank"
            class=" flex flex-col flex-1 hover:shadow-lg translateY-2px m-6 no-underline transition">
            <div class="p-6 flex flex-col flex-1 bg-white text-center rounded-lg">
                <div class="rounded-t-lg self-center">
                    <svg class="fill-current text-center h-100 w-100 text-blue m-4" width="100" height="100"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path xmlns="http://www.w3.org/2000/svg"
                            d="M13 20v-5h-2v5a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-7.59l-.3.3a1 1 0 1 1-1.4-1.42l9-9a1 1 0 0 1 1.4 0l9 9a1 1 0 0 1-1.4 1.42l-.3-.3V20a2 2 0 0 1-2 2h-3a2 2 0 0 1-2-2zm5 0v-9.59l-6-6-6 6V20h3v-5c0-1.1.9-2 2-2h2a2 2 0 0 1 2 2v5h3z" />
                    </svg>
                </div>



                <div class="mb-4 w-full mx-auto text-center text-sm">
                    <button class="w-1/2 btn btn-mstore btn-mstore:hover focus:outline-none">
                        เปิด Application
                    </button>
                </div>
            </div>
        </a>
    </div>

    <div class="w-full md:w-1/2 lg:w-1/3 flex flex-col m-6">
        <a href="{{ 'http://'.$fqdn }}/app" target="_blank"
            class=" flex flex-col flex-1 hover:shadow-lg translateY-2px m-6 no-underline transition">
            <div class="p-6 flex flex-col flex-1 bg-white text-center rounded-lg">
                <div class="rounded-t-lg self-center">
                    <svg class="fill-current text-center h-100 w-100 text-blue m-4" width="100" height="100"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path xmlns="http://www.w3.org/2000/svg"
                            d="M9 4.58V4c0-1.1.9-2 2-2h2a2 2 0 0 1 2 2v.58a8 8 0 0 1 1.92 1.11l.5-.29a2 2 0 0 1 2.74.73l1 1.74a2 2 0 0 1-.73 2.73l-.5.29a8.06 8.06 0 0 1 0 2.22l.5.3a2 2 0 0 1 .73 2.72l-1 1.74a2 2 0 0 1-2.73.73l-.5-.3A8 8 0 0 1 15 19.43V20a2 2 0 0 1-2 2h-2a2 2 0 0 1-2-2v-.58a8 8 0 0 1-1.92-1.11l-.5.29a2 2 0 0 1-2.74-.73l-1-1.74a2 2 0 0 1 .73-2.73l.5-.29a8.06 8.06 0 0 1 0-2.22l-.5-.3a2 2 0 0 1-.73-2.72l1-1.74a2 2 0 0 1 2.73-.73l.5.3A8 8 0 0 1 9 4.57zM7.88 7.64l-.54.51-1.77-1.02-1 1.74 1.76 1.01-.17.73a6.02 6.02 0 0 0 0 2.78l.17.73-1.76 1.01 1 1.74 1.77-1.02.54.51a6 6 0 0 0 2.4 1.4l.72.2V20h2v-2.04l.71-.2a6 6 0 0 0 2.41-1.4l.54-.51 1.77 1.02 1-1.74-1.76-1.01.17-.73a6.02 6.02 0 0 0 0-2.78l-.17-.73 1.76-1.01-1-1.74-1.77 1.02-.54-.51a6 6 0 0 0-2.4-1.4l-.72-.2V4h-2v2.04l-.71.2a6 6 0 0 0-2.41 1.4zM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0-2a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" />
                    </svg>
                </div>



                <div class="mb-4 w-full mx-auto text-center text-sm">
                    <button class="w-1/2 btn btn-mstore btn-mstore:hover focus:outline-none">
                        Account Setting
                    </button>
                </div>
            </div>
        </a>
    </div>
</div>

@endsection

@section('footer')
@include('partials.footer')
@endsection

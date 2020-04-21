@extends('layouts.app')

@section('nav')
@include('partials.nav')
@endsection

@section('content')
<!--image-->
<div class="w-full max-w-4xl mx-auto bg-white bg-cover "
    style="background-image:url('{{  Storage::url('mshome4.jpg') }}'); ">
    <div class="p-6">
        <div class="xl:flex -mx-6">
            <div class="max-w-2xl mx-auto p-2 md:p-2 t leading-normal ">
                <h1 class="text-2xl text-black sm:text-4xl md:text-5xl xl:text-4xl  font-semibold leading-tight">
                    สำหรับสมาชิก MStore
                </h1>
                <span class="sm:block text-white text-xl font-base">
                    ลงโพสโฆษณาร้านค้าตามหมวดหมู่ที่คุณต้องการ</span>
                <p class="mt-4 leading-relaxed sm:text-base md:text-xl xl:text-lg text-black font-base">
                    แพลตฟอร์มออนไลน์ง่ายๆ ที่ผู้ใช้สามารถโพสต์หรือดูโฆษณาได้ตามความต้องการ
                    โพสโฆษณาใน MStore มีการแยกประเภทและหมวดหมู่ย่อยที่แตกต่างกันเพื่อให้ลูกค้าสามารถ
                    ได้รับข้อมูลที่ต้องการได้อย่างรวดเร็ว
                </p>
                <div class=" mx-auto flex mt-6 justify-start md:justify-center xl:justify-center">

                    <a href="/services"
                        class="ml-4 rounded-lg px-4 md:px-5 xl:px-4 py-3 md:py-4 xl:py-3 bg-blue hover:bg-mstore md:text-lg xl:text-base text-white font-semibold leading-tight shadow-md">ลงโพส
                        คลิก!</a>
                </div>

            </div>

        </div>
    </div>

</div>



<div class="flex flex-wrap max-w-2xl mx-auto my-2">
    <div class="flex flex-wrap bg-black w-full mr-20 border rounded-lg shadow-2xl p-4 md:p-12 text-lg md:text-2lg text-grey-darkest leading-normal" >


    <div class="w-full md:w-1/2 lg:w-1/3 flex flex-col ">
        <a href="/" target="_blank"
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
                        ลงโพส
                    </button>
                </div>
            </div>
        </a>
    </div>

    <div class="w-full md:w-1/2 lg:w-1/3 flex flex-col ">
        <a href="/" target="_blank"
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
                        บัญชีโฆษณา
                    </button>
                </div>
            </div>
        </a>
    </div>
    <div class="w-full md:w-1/2 lg:w-1/3 flex flex-col ">
        <a href="/" target="_blank"
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
                        บัญชีโฆษณา
                    </button>
                </div>
            </div>
        </a>
    </div>
</div>
</div>

@endsection

@section('footer')
@include('partials.footer')
@endsection

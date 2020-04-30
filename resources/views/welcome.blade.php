@extends('layouts.app')
@section('nav')
    @include('partials.nav')
@endsection

@section('content')

<!--image-->
<div class="max-w-full mx-auto rounded-t-lg  bg-white">
    <div class="mx-0 sm:mx-6">
        <div class="  w-full p-4 md:p-4 t leading-normal rounded-lg">
            <p class="text-xl md:text-2xl font-semibold text-center text-black subpixel-antialiased">
                หาอะไรอยู่?
            </p>

            <p class="py-2 text-lg md:text-xl  text-grey-darker text-center mt-4 subpixel-antialiased">
                Search Component here!
            </p>

        </div>
    </div>
</div>
<div class="max-w-full mx-auto bg-gray-300 bg-cover "
    style="background-image:url('{{  Storage::url('mshome3.jpg') }}'); height: 70vh; ">

    <div class="p-6">
        <div class="xl:flex -mx-6">
            <div class="max-w-2xl mx-auto p-4 md:p-4 t leading-normal ">

                <h1 class="text-2xl text-black font-extrabold sm:text-4xl md:text-5xl xl:text-4xl leading-tight">
                    Classifieds website portal
                </h1>
                <span class="sm:block text-indigo-500 text-xl ">
                    โพสโฆษณาร้านค้าตามหมวดหมู่ที่คุณต้องการ</span>
                <p class="mt-4 leading-relaxed sm:text-base md:text-xl xl:text-lg text-gray-900">
                    แพลตฟอร์มออนไลน์ง่ายๆ ที่ผู้ใช้สามารถโพสต์หรือดูโฆษณาได้ตามความต้องการ
                    โพสโฆษณาใน MStore มีการแยกประเภทและหมวดหมู่ย่อยที่แตกต่างกันเพื่อให้ลูกค้าสามารถ
                    ได้รับข้อมูลที่ต้องการได้อย่างรวดเร็ว
                </p>
                <div class=" mx-auto flex mt-4 justify-center">

                    <a href="/services"
                        class="ml-4 rounded-lg px-4 md:px-5 xl:px-4 py-3 md:py-4 xl:py-3 text-white bg-blue-500 hover:bg-blue-700 text-base  leading-tight shadow-md">ลงโพส
                        คลิก</a>
                </div>

            </div>

        </div>
    </div>
</div>




<div class="flex flex-wrap max-w-3xl mx-auto my-2">

    <div class="w-full md:w-1/2 lg:w-1/3 flex flex-col  ">
        <a href="/features"
            class=" flex flex-col flex-1 rounded shadow hover:shadow-lg translateY-2px m-6 no-underline transition">

            <div class="aspect-16x9 rounded-t-lg"
                style="background:url('{{  Storage::url('clasified.png') }}') no-repeat center center/cover">
            </div>
            <div class="p-6 flex flex-col flex-1 bg-white text-center rounded-b-lg">
                <h2 class="mb-3 text-grey-800 text-xl">Features</h2>
                <p class="text-grey-800 mb-6 text-sm">ลงโพสโฆษณาธุรกิจของคุณได้ง่ายๆ
                <div class="mb-4 w-full mx-auto text-center ">
                    <button class="w-1/2  btn btn-blue btn-blue:hover focus:outline-none">
                        รายละเอียด
                    </button>
                </div>

            </div>
        </a>
    </div>

    <div class="w-full md:w-1/2 lg:w-1/3 flex flex-col  ">
        <a href="/prices"
            class=" flex flex-col flex-1 rounded shadow hover:shadow-lg translateY-2px m-6 no-underline transition">

            <div class="aspect-16x9 rounded-t-lg"
                style="background:url('{{  Storage::url('search.png') }}') no-repeat center center/cover">
            </div>
            <div class="p-6 flex flex-col flex-1 bg-white text-center rounded-b-lg antialiased">
                <h2 class="mb-3 text-grey-800 text-xl">Services</h2>
                <p class="text-grey-darker mb-6 text-sm">ค้นหา สินค้า ร้านค้า ผู้ผลิต แบ่งเป็นหมวดหมู่
                </p>
                <div class="mb-4 w-full mx-auto text-center">
                    <button class="w-1/2  btn btn-blue btn-blue:hover focus:outline-none">
                        รายละเอียด
                    </button>
                </div>
            </div>
        </a>
    </div>

    <div class="w-full md:w-1/2 lg:w-1/3 flex flex-col ">
        <a href="/blog"
            class=" flex flex-col flex-1 rounded shadow hover:shadow-lg translateY-2px m-6 no-underline transition">

            <div class="aspect-16x9 rounded-t-lg"
                style="background:url('{{  Storage::url('blog.jpg') }}') no-repeat center center/cover">
            </div>
            <div class="p-6 flex flex-col flex-1 bg-white text-center rounded-b-lg subpixel-antialiased">
                <h2 class="mb-3 text-grey-800 text-xl">Blog</h2>
                <p class="text-grey-darker mb-6 text-sm">บทความ/ข่าวสารที่น่าสนใจ</p>
                <div class="mb-4 w-full mx-auto text-center ">
                    <button class="w-1/2 btn btn-blue btn-blue:hover focus:outline-none text-base">
                        รายละเอียด
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

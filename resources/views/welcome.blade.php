@extends('layouts.app')
@section('nav')
    @include('partials.nav')
@endsection

@section('content')

<!--image-->

<div class="max-w-full mx-auto bg-gray-300 bg-cover pt-16 "
    style="background-image:url('{{  Storage::url('mshome3.jpg') }}'); ">

    <div class="p-6">
        <div class="xl:flex -mx-6">
            <div class="max-w-2xl mx-auto p-4 md:p-4 t leading-normal ">

                <h1 class="text-3xl text-black font-extrabold sm:text-4xl md:text-5xl xl:text-4xl leading-tight">
                    Classifieds website portal
                </h1>
                <span class="sm:block text-indigo-500 text-2xl font-bold ">
                    โพสโฆษณาธุรกิจตามประเภทที่ต้องการ</span>
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
<div class="max-w-full mx-auto bg-gray-400">
    <div class="max-w-md mx-auto mx-0 ">

        <div class="relative w-full p-4 md:p-4 t leading-normal">

            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" aria-labelledby="search" role="presentation" class="fill-current absolute  ml-3 mt-3 text-gray_200"><path fill-rule="nonzero" d="M14.32 12.906l5.387 5.387a1 1 0 0 1-1.414 1.414l-5.387-5.387a8 8 0 1 1 1.414-1.414zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"></path></svg>
            <input dusk="global-search" type="search" placeholder="กด / เพื่อค้นหาสินค้าหรือธุรกิจ" class="transition-colors duration-100 ease-in-out focus:outline-0 border border-transparent focus:bg-white  placeholder-gray-600 rounded-lg bg-gray-100 py-2 pr-4 pl-10 block w-full appearance-none leading-normal ds-input">
        </div>

    </div>
</div>
<div class="w-max-full mx-auto">


            {{--category --}}
            <div class="mx-4">
                <div class="w-full mt-4 flex flex-row p-2 md:p-2   bg-gray-800 rounded">

                    <div class="text-sm md:text-base w-1/2 font-thin md:font-normal text-left text-white subpixel-antialiased">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" class="fill-current absolute  "><path d="M1 4h2v2H1V4zm4 0h14v2H5V4zM1 9h2v2H1V9zm4 0h14v2H5V9zm-4 5h2v2H1v-2zm4 0h14v2H5v-2z"/></svg>
                        <span class="pl-8 py-2">ประเภทธุรกิจ</span>
                    </div>
                    <div class="text-sm w-1/2 font-thin text-right text-gray-100 hover:text-yellow-500 subpixel-antialiased">
                        <a href="/classified">ดูทั้งหมด</a>
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap  w-full xl:mx-0 rounded-lg">
                <div class="flex flex-wrap  w-full xl:mx-0 ">
                    @for ($i = 1; $i < 7; $i++)
                        <div class="w-full   flex flex-col w-1/2 md:w-1/3 lg:w-1/6 xl:w-1/6">
                            <a href="/blog" class=" flex flex-col flex-1 rounded shadow hover:shadow-lg translateY-2px m-4 no-underline transition bg-indigo-400">
                                <div class="rounded-t-lg self-center ">
                                    <svg class="fill-current text-gray-200 text-center mt-4" width="60" height="60"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path xmlns="http://www.w3.org/2000/svg"
                                            d="M18 9.87V20H2V9.87a4.25 4.25 0 0 0 3-.38V14h10V9.5a4.26 4.26 0 0 0 3 .37zM3 0h4l-.67 6.03A3.43 3.43 0 0 1 3 9C1.34 9 .42 7.73.95 6.15L3 0zm5 0h4l.7 6.3c.17 1.5-.91 2.7-2.42 2.7h-.56A2.38 2.38 0 0 1 7.3 6.3L8 0zm5 0h4l2.05 6.15C19.58 7.73 18.65 9 17 9a3.42 3.42 0 0 1-3.33-2.97L13 0z" />
                                    </svg>
                                </div>
                                <div class="p-2 flex flex-col flex-1 transition-colors rounded-b-lg subpixel-antialiased">
                                    <h2 class="mb-2 text-grey-600 text-sm font-bold text-center">Category  {{ $i }}</h2>

                                </div>
                            </a>
                        </div>
                    @endfor
                </div>
            </div>

</div>


<div class="w-max-full mx-auto">
    <div class="flex">
        <div class="max-w-full  mx-auto xl:w-3/4">
            <div class="mx-4">
                <div class="w-full mt-4 flex flex-row p-2 md:p-2   bg-gray-800 rounded">

                    <div class="text-sm md:text-base w-1/2 font-thin md:font-normal text-left text-white subpixel-antialiased">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" class="fill-current absolute  ml-2 "><path d="M10 12a6 6 0 1 1 0-12 6 6 0 0 1 0 12zm0-3a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm4 2.75V20l-4-4-4 4v-8.25a6.97 6.97 0 0 0 8 0z"/></svg>
                        <span class="pl-8 py-2">ธุรกิจมาใหม่</span>
                    </div>
                    <div class="text-sm w-1/2 font-thin text-right text-gray-100 hover:text-yellow-500 subpixel-antialiased">
                        <a href="/blog">ดูทั้งหมด</a>
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap  w-full xl:mx-0 rounded-lg">
                <div class="flex flex-wrap  w-full xl:mx-0 ">
                    @for ($i = 0; $i < 4; $i++)
                        <div class="w-full  flex flex-col md:w-1/2 lg:w-1/4 xl:w-1/4">
                            <a href="/blog" class=" flex flex-col flex-1 rounded shadow hover:shadow-lg translateY-2px m-4 no-underline transition">
                                <div class="aspect-16x9 rounded-t-lg"
                                    style="background:url('{{  Storage::url('blog.jpg') }}') no-repeat center center/cover">
                                </div>
                                <div class="p-2 flex flex-col flex-1 bg-white  rounded-b-lg subpixel-antialiased">
                                    <h2 class="mb-2 text-grey-900 text-base font-bold text-left">บริษัท ตัวอย่าง {{ $i }}</h2>
                                    <div class="mb-3 w-full mx-auto text-left text-sm font-thin ">
                                        <p>หากคุณกำลังรู้สึกท้อกับงานที่ทำ jobsDB มีข้อคิดดี ๆ มาสร้างแรงบันดาลใจในการทำงาน.. </p>
                                        <p class="text-blue-500">Read More...</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endfor
                </div>
            </div>
            {{--  Blogs --}}
            <div class="w-full mx-auto rounded-lg  m-2">
                <div class="mx-4">
                    <div class="w-full mt-4 flex flex-row p-2 md:p-2   bg-gray-800 rounded">
                        <div class="text-sm md:text-base w-1/2 font-thin md:font-normal text-left text-white subpixel-antialiased">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" class="fill-current absolute  ml-2 "><path d="M16 2h4v15a3 3 0 0 1-3 3H3a3 3 0 0 1-3-3V0h16v2zm0 2v13a1 1 0 0 0 1 1 1 1 0 0 0 1-1V4h-2zM2 2v15a1 1 0 0 0 1 1h11.17a2.98 2.98 0 0 1-.17-1V2H2zm2 8h8v2H4v-2zm0 4h8v2H4v-2zM4 4h8v4H4V4z"/></svg>
                            <span class="pl-8 py-2">บทความน่าสนใจ</span>
                        </div>
                        <div class="text-sm w-1/2 font-thin text-right text-gray-100 hover:text-yellow-500 subpixel-antialiased">
                            <a href="/blog">ดูทั้งหมด</a>
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap  w-full xl:mx-0 ">
                    @for ($i = 0; $i < 4; $i++)
                        <div class="w-full  flex flex-col md:w-1/2 lg:w-1/4 xl:w-1/4">
                            <a href="/blog" class=" flex flex-col flex-1 rounded shadow hover:shadow-lg translateY-2px m-4 no-underline transition">
                                <div class="aspect-16x9 rounded-t-lg"
                                    style="background:url('{{  Storage::url('blog.jpg') }}') no-repeat center center/cover">
                                </div>
                                <div class="p-2 flex flex-col flex-1 bg-white text-left rounded-b-lg subpixel-antialiased">
                                    <h2 class="mb-2 text-grey-900 text-base font-bold">บทความที่ {{ $i }}</h2>

                                    <div class="mb-3 w-full mx-auto text-left text-sm font-thin ">
                                        <p>หากคุณกำลังรู้สึกท้อกับงานที่ทำ jobsDB มีข้อคิดดี ๆ มาสร้างแรงบันดาลใจในการทำงาน เพื่อจุดไฟการทำงานให้ลุกโชติช่วงอีกครั้ง</p>
                                        <p class="text-blue-500">Read More...</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endfor
                </div>
            </div>

        </div>
        {{-- //right-side --}}
        <div class="hidden  xl:text-sm xl:block xl:w-1/4 h-full ">
            <div class="flex flex-col justify-between overflow-y-auto sticky top-0  p-2">
                @for ($i = 0; $i < 5; $i++)
                    <div class=" bg-gray-400 w-full mx-auto p-4 m-2  rounded-lg h-32">
                        <h1 class="text-xl font-semibold">ads {{ $i }}</h1>
                        <p class="text-lg font-base">The current value is {{ $i }}</p>
                        <p class="text-sm font-thin">The current value is {{ $i }}</p>
                    </div>
                @endfor
            </div>
        </div>
    </div>
</div>


@endsection

@section('footer')
    @include('partials.footer')

@endsection

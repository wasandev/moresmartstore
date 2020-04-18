@extends('layouts.app')
@section('nav')
@include('partials.nav')
@endsection


@section('content')

<!--image-->
<div class="max-w-full mx-auto bg-white bg-cover "
    style="background-image:url('{{  Storage::url('mshome2.jpg') }}'); height: 50vh;opacity: .75;">

    <div class="p-6">
        <div class="xl:flex -mx-6">
            <div class="max-w-2xl mx-auto p-4 md:p-2 t leading-normal">

                <h1 class="text-3xl text-black sm:text-4xl md:text-5xl xl:text-4xl font-light font-bold leading-tight">
                    Classifieds website portal
                </h1>
                <span class="sm:block text-grey-dark text-2xl font-normal">
                    โพสโฆษณาร้านค้าตามหมวดหมู่ที่คุณต้องการ</span>
                <p class="mt-4 leading-relaxed sm:text-base md:text-xl xl:text-lg text-black font-semibold">
                    Simple online platform where users can post or view the ads as per their requirements.
                    Advertisements posted
                    in the portal are based on different types of categories and subcategories so that the customers can
                    get their
                    information quickly.
                </p>
                <div class=" mx-auto flex mt-6 justify-start md:justify-center xl:justify-center">

                    <a href="/services"
                        class="ml-4 rounded-lg px-4 md:px-5 xl:px-4 py-3 md:py-4 xl:py-3 bg-blue hover:bg-mstore md:text-lg xl:text-base text-white font-semibold leading-tight shadow-md">หาอะไรอยู่
                        คลิก!</a>
                </div>

            </div>

        </div>
    </div>
</div>

<div class="max-w-full mx-auto bg-white">
    <div class="mx-0 sm:mx-6">
        <div class="  w-full p-4 md:p-4 t leading-normal rounded-lg">
            <p class="text-xl md:text-2xl font-semibold text-center text-black">
                หาอะไรอยู่?
            </p>

            <p class="py-2 text-lg md:text-xl  text-grey-darker text-center mt-4">
                Search Component here!
            </p>

        </div>
    </div>
</div>


<div class="flex flex-wrap max-w-3xl mx-auto my-4">

    <div class="w-full md:w-1/2 lg:w-1/3 flex flex-col  ">
        <a href="/features"
            class=" flex flex-col flex-1 rounded shadow hover:shadow-lg translateY-2px m-6 no-underline transition">

            <div class="aspect-16x9 rounded-t-lg"
                style="background:url('{{  Storage::url('clasified.png') }}') no-repeat center center/cover">
            </div>
            <div class="p-6 flex flex-col flex-1 bg-white text-center rounded-b-lg">
                <h2 class="mb-3 text-grey-darkest text-xl">Features</h2>
                <p class="text-grey-darker mb-6 text-sm">You can promote your business quickly</p>

                <div class="mb-4 w-full mx-auto text-center text-sm">
                    <button class="w-1/2 btn btn-blue btn-blue:hover focus:outline-none">
                        ดูรายละเอียด
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
            <div class="p-6 flex flex-col flex-1 bg-white text-center rounded-b-lg">
                <h2 class="mb-3 text-grey-darkest text-xl">Services</h2>
                <p class="text-grey-darker mb-6 text-sm">Searching for. Images, contact details, contact number,
                    explanations, properties
                </p>
                <div class="mb-4 w-full mx-auto text-center text-sm">
                    <button class="w-1/2 btn btn-blue btn-blue:hover focus:outline-none">
                        ดูรายละเอียด
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
            <div class="p-6 flex flex-col flex-1 bg-white text-center rounded-b-lg">
                <h2 class="mb-3 text-grey-darkest text-xl">Blog</h2>
                <p class="text-grey-darker mb-6 text-sm">บทความ/ข่าวสารที่น่าสนใจ</p>
                <div class="mb-4 w-full mx-auto text-center text-sm">
                    <button class="w-1/2 btn btn-blue btn-blue:hover focus:outline-none">
                        ดูรายละเอียด
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

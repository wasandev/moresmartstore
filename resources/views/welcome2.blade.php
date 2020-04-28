@extends('layouts.app')
@section('nav')
    @include('partials.nav')
@endsection

@section('content')

<div class="bg-gray-100 flex max-w-full mx-auto">
    <div class="px-8 py-12 max-w-md mx-auto sm:max-w-xl lg:max-w-full lg:w-1/2 lg:py-24 lg:px-12">
      <div class="xl:max-w-lg xl:ml-auto">

        <img class="mt-6 rounded-lg shadow-xl sm:mt-8 sm:h-64 sm:w-full sm:object-cover sm:object-center lg:hidden" src="{{  Storage::url('mshome6.png') }}" alt="Classifieds website portal">
        <h1 class="mt-6 text-xl font-bold text-gray-900 leading-tight sm:mt-8 sm:text-4xl lg:text-3xl xl:text-4xl">
          MStore : Classifieds website
          <br class="hidden lg:inline"><span class="text-indigo-500">ลงโพสโฆษณาธุรกิจ ฟรี!</span>
        </h1>
        <p class="mt-2 text-gray-600 sm:mt-4 sm:text-xl">
          แพลตฟอร์มออนไลน์ง่ายๆ ที่ผู้ใช้สามารถโพสต์หรือดูโฆษณาได้ตามความต้องการ โพสโฆษณาใน MStore มีการแยกประเภทและหมวดหมู่ย่อยที่แตกต่างกันเพื่อให้ลูกค้าสามารถ ได้รับข้อมูลที่ต้องการได้อย่างรวดเร็ว
        </p>
        <div class="mt-4 sm:mt-6">
          <a href="/search" class="inline-block px-5 py-3 rounded-lg shadow-lg bg-indigo-500 hover:bg-indigo-400 active:bg-indigo-600 focus:outline-none focus:shadow-outline text-sm text-white uppercase tracking-wider font-semibold sm:text-base">ค้นหาข้อมูลธุรกิจ</a>
        </div>
      </div>
    </div>
    <div class="inset-0 h-full w-full object-cover object-center hidden lg:block lg:w-1/2 lg:relative" >
      <img class=" " src="{{  Storage::url('mshome6.png') }}" alt="Classifieds website portal">
    </div>
  </div>


@endsection

@section('footer')
@include('partials.footer')

@endsection

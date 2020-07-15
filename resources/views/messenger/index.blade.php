@extends('layouts.app')
@section('nav')
    @include('partials.nav')
@endsection

@section('search')
    @include('partials.search')
@endsection



@section('content')
    @include('messenger.partials.flash')
    <div id="app" class=" lg:max-w-xl lg:mx-auto bg-white shadow-md rounded px-4 pt-6 pb-8 mb-4 mt-4">

        <div class="text-xl font-bold py-2 items-center flex">
            <svg xmlns="http://www.w3.org/2000/svg" class="fill-current absolute mr-4"  width="20" height="20" viewBox="0 0 20 20"><path d="M0 2C0 .9.9 0 2 0h16a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm14 12h4V2H2v12h4c0 1.1.9 2 2 2h4a2 2 0 0 0 2-2z"/></svg>
            <span class="ml-6">กล่องข้อความ</span>
        </div>
        <table class="table-auto w-full mx-auto lg:mx-0">
            <thead>
            <tr class="border">
                <th class="border px-2 py-2">ยังไม่อ่าน</th>
                <th class="border px-2 py-2">เรื่อง</th>
                <th class="border px-2 py-2">ผู้ส่ง</th>
                <th class="border px-2 py-2">อัพเดทล่าสุด</th>
            </tr>
            </thead>
            <tbody>
            @each('messenger.partials.thread', $threads, 'thread', 'messenger.partials.no-threads')
            </tbody>
        </table>

    </div>
@stop

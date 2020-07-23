@extends('layouts.app')
@section('nav')
    @include('partials.nav')
@endsection
@section('content')
<div id="app" class="w-full max-w-md mx-auto mt-20">



    <form action="{{ route('messages.store') }}" method="post" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        {{ csrf_field() }}
            <div class="mb-4">
                <h1>ส่งข้อความถึง : {{$user->name}}</h1>
            </div>
            <!-- Subject Form Input -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="subject">
                    เรื่อง
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  name ="subject" type="text" placeholder="เรื่อง" value="{{ $subject }}">
            </div>

            <!-- Message Form Input -->
            <div class="mb-6">

                <label class="block text-gray-700 text-sm font-bold mb-2" for="message">
                    ข้อความ
                </label>
                <textarea name="message" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline h-16">
                    {{ old('message') }}
                </textarea>
            </div>


            <div>
                <input type="hidden"  name="recipients" placeholder="{{$user->name}}"                   value="{{ $user->id }}">
            </div>

            <!-- Submit Form Input -->
            <div class="flex flex-row justify-between">
                <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                    ส่งข้อความ
                </button>
                <a href="/messages" type="submit" class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">ปิด</a>
            </div>
    </form>
</div>
@endsection

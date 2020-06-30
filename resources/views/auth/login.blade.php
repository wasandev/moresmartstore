@extends('layouts.app')


@section('content')

@include('partials.header')

<div  class="w-full mx-auto max-w-xs">
<form
    class=" bg-white shadow-md rounded-lg px-8 pt-4 pb-8 mb-4" method="POST" action="{{ route('login') }}">

    {{ csrf_field() }}
    @component('partials.heading')
        {{ __('auth.Login') }}
    @endcomponent

    @if ($errors->any())
        <p class="text-center font-semibold text-red my-3">
            @if ($errors->has('email'))
            {{ $errors->first('email') }}
            @else
            {{ $error->first('password') }}
            @endif
        </p>

    @endif

    <div class="mb-1 {{ $errors->has('email') ? ' has-error' : ''  }}">
        <label  class="block text-gray-900 text-base font-thin mb-2" for="email">{{ __('auth.email') }}</label>
        <input class="appearance-none border rounded w-full py-2 px-3 text-gray-900 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email"  name="email" value="{{ old('email') }}" required autofocus>
    </div>

    <div class="mb-1 {{ $errors->has('password') ? 'has-error' : '' }}">
        <label class="block text-gray-900 text-base font-thin mb-2" for="password">{{ __('auth.password') }}</label>
        <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" name="password" required>
    </div>

    <div class="flex mb-4">
        <label class="flex items-center justify-between">
            <input class="" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
            <span class="text-base text-grey-900 ml-2"> {{ __('auth.remember me') }}</span>
        </label>
        <div class="ml-auto">
            <a class="inline-block align-baseline font-semibold text-base text-blue-700 hover:text-blue-900" href="{{ route('password.request') }}">
                {{ __('auth.forgot your password?') }}
            </a>
        </div>
    </div>
    <div class="mb-4 mx-auto text-center">
        <button class="w-full inline-block px-2 py-2  btn btn-blue btn-blue:hover focus:outline-none focus:shadow-outline tracking-wider" type="submit" >
            {{ __('auth.Login') }}
        </button>
    </div>
    <div class="mb-4 w-full mx-auto text-center">
        <a class="w-full inline-block px-2 py-2 align-baseline font-base text-sm rounded-lg text-gray-100 bg-red-500 hover:text-black hover:bg-yellow-400" href="{{ route('register') }}">
            ยังไม่มีบัญชี คลิกที่นี่เพื่อสมัคร
        </a>
    <div>

 </form>


</div>

@endsection


@extends('layouts.app')


@section('content')

@include('partials.header')

<form
    class="bg-white shadow-md rounded-lg p-4 max-w-xs mx-auto"
    method="POST" action="{{ route('register') }}">

    {{ csrf_field() }}
    @component('partials.heading')
        {{ __('auth.register') }}
    @endcomponent
    @if ($errors->any())
    <p class="text-center font-normal text-red my-3">
        @if ($errors->has('name'))
            {{ $errors->first('name') }}
        @elseif ($errors->has('email'))
            {{ $errors->first('email    ') }}
        @elseif ($errors->has('role'))
            {{ $errors->first('role') }}
        @elseif ($errors->has('terms'))
            {{ $errors->first('terms') }}
        @else
            {{ $errors->first('password') }}
        @endif
    </p>
    @endif
    <div class="mb-1 {{ $errors->has('name') ? ' has-error' : ''  }}">
        <label  class="block font-thin mb-1" for="name">{{ __('auth.name') }}</label>
        <input class="appearance-none border rounded w-full py-2 px-3 text-gray-900 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
    </div>

    <div class="mb-1 {{ $errors->has('email') ? ' has-error' :'' }}">
        <label class="block font-thin mb-1" for="email">{{ __('auth.email') }}</label>
        <input class="appearance-none border rounded w-full py-2 px-3 text-gray-900 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
    </div>


    <div class=" mb-1 {{ $errors->has('password') ? 'has-error' : '' }}">
        <label class="block font-thin mb-1" for="password">{{ __('auth.password') }}</label>
        <input class="appearance-none border rounded w-full py-2 px-3 text-gray-900 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" name="password" required>

    </div>

    <div class="mb-1  {{ $errors->has('password') ? 'has-error' : '' }}">
        <label class="block thin mb-1" for="password_confirmation" >{{ __('auth.Confirm Password') }}</label>
        <input class="appearance-none border rounded w-full py-2 px-3 text-gray-900 leading-tight focus:outline-none focus:shadow-outline" id="password_confirmation" type="password" name="password_confirmation" required>

    </div>


    <div class="flex mb-1 text-center">
        <label class="flex items-center block text-base font-thin">
            <input class="leading-tight" type="checkbox" name="terms" required>
        <a href="pages/terms" target="_blank" class="text-blue-700 no-underline hover:text-green-500">
            <span class="text-sm ml-2">{{ __('auth.Agree To Terms') }}</span>
        </a>
        </label>

    </div>

    <div class="mb-4 w-full mx-auto text-center">
        <button class="w-full inline-block px-2 py-2 rounded-lg shadow-lg btn btn-blue btn-blue:hover focus:outline-none focus:shadow-outline tracking-wider" type="submit">
        {{ __('auth.register') }}
        </button>

    </div>

</form>

@endsection

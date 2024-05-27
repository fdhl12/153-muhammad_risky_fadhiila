@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center text-5xl">{{ __('Register') }}</div>
        

                <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                    <form class="space-y-6" action="{{ url('/register') }}" method="POST">
                        @csrf
                        <div>
                            <label for="username" class="block text-sm font-medium leading-6 text-gray-900">{{ __('Username') }}</label>
                            <div class="mt-2">
                                <input id="username" name="username" type="username" autocomplete="username" value="{{ old('name') }}" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div>
                            <label for="name" class="block text-sm font-medium leading-6 text-gray-900">{{ __('Full Name') }}</label>
                            <div class="mt-2">
                                <input id="name" name="name" type="name" autocomplete="name" value="{{ old('name') }}" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">{{ __('Email Address') }}</label>
                            <div class="mt-2">
                                <input id="email" name="email" type="email" autocomplete="email" value="{{ old('email') }}" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div>
                            <div class="flex items-center justify-between">
                                <label for="password" class="block text-sm font-medium leading-6 text-gray-900">{{ __('Password') }}</label>
                            </div>
                            <div class="mt-2">
                                <input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="flex items-center justify-between">
                                <label for="password-confirm" class="block text-sm font-medium leading-6 text-gray-900">{{ __('Confirm Password') }}</label>
                            </div>
                            <div class="mt-2">
                                <input id="password-confirm" name="password_confirmation" type="password" required autocomplete="new-password" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">{{ __('Register') }}</button>
                          </div>

                    </form>
                </div>
    </div>
</div>
@endsection

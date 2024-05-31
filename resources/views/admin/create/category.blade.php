@extends('layouts.app')

@section('content')
<div class="container pt-16 mx-auto px-4">
    <div class="flex">
        <x-nav-link href="/admin" class="hover:underline text-black">
            <h3 class="text-xl font-bold mb-4">Dashboard</h3>
        </x-nav-link>
        <span class="text-gray-600 text-2xl mx-2">&gt;</span>
        <x-nav-link href="/admin/categories" class="hover:underline text-black">
            <h3 class="text-xl font-bold mb-4">Manage Category</h3>
        </x-nav-link>
        <span class="text-gray-600 text-2xl mx-2">&gt;</span>
        <x-nav-link href="{{ route('categories.create') }}" class="hover:underline text-black">
            <h3 class="text-xl font-bold mb-4">Add</h3>
        </x-nav-link>
    </div>
    {{-- <div class="items-end">
        <x-nav-link href="{{ route('categories.create', $category->name) }}" class="hover:underline text-black">
            <h3 class="text-xl font-bold mb-4">Create</h3>
        </x-nav-link>
    </div> --}}

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <form class="space-y-6" action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">{{ __('Name') }}</label>
                <div class="mt-2">
                    <input id="name" name="name" type="name" autocomplete="name" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                @error('category')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image" >Upload Photo</label>
            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" type="file" name="image" id="image" accept="image/*">
            
           
            

        <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create Category</button>
    </form>
</div>
@endsection

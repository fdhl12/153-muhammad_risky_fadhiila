@extends('layouts.app')
@section('content')
<div class="container pt-16 mx-auto px-4">
    <div class="flex">
        <x-nav-link href="/categories" class="hover:underline text-black">
            <h3 class="text-xl font-bold mb-4">Category</h3>
        </x-nav-link>
        <span class="text-gray-600 text-2xl mx-2">&gt;</span>
        <x-nav-link href="{{ route('categories.show', $category->id) }}" class="hover:underline text-black">
            <h3 class="text-xl font-bold mb-4">{{ $category->name }}</h3>
        </x-nav-link>
    </div>
    
    <div class="flex items-center justify-center">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($contents as $content)
            <!-- Content Card -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <img src="https://via.placeholder.com/400x200" alt="Story Image" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h2 class="text-xl font-bold mb-2">{{ $content->title }}</h2>
                    <p class="text-gray-700 mb-4">{!! $content->description !!}</p>
                    <div class="flex justify-between items-center">
                        <a href="{{ route('contents.show', $content->id) }}" class="text-indigo-600 hover:text-indigo-900">Read More</a>
                        <span class="text-gray-600">{{ $content->user->name }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
            {{-- @foreach ($contents as $content)
            <div class=" bg-white rounded-lg shadow-md p-6">
                
                    
                        <div class="text-gray-900">
                           <h1 class="text-2xl font-bold mb-4"> {{ $content->title }} </h1>
                        </div>
                        <div class="text-sm leading-5 text-gray-900 mb-4">{{ $content->category->name }}</div>
                    
                        <div class="text-sm leading-5 text-gray-900"><p class="text-gray-700 mb-4">{!! $content->description !!}</p></div>
                    
                        <div class="text-sm leading-5 text-gray-900 mb-4">Author : {{ $content->user->name }}</div>
                    
                
            </div>
            @endforeach --}}
    </div>
</div>
@endsection
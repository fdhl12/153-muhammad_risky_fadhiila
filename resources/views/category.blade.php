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
    
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($contents as $content)
            <!-- Content Card -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                @if($content->image)
                        <img src="{{ asset('storage/' . $content->image) }}" alt="Content Image" class="w-full h-48 object-cover">
                    @else
                        <img src="https://via.placeholder.com/400x200" alt="Placeholder Image" class="w-full h-48 object-cover">
                    @endif
                <div class="p-6">
                    <a href="{{ route('contents.show', $content->id) }}" class="text-indigo-600 hover:text-indigo-900">
                    <h2 class="text-xl font-bold text-gray-900 mb-2">{{ Str::limit($content->title) }}</h2> </a>
                    <p class="text-gray-700 mb-4">{!! Str::limit($content->description) !!}</p>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">{{ $content->user->name }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
            
</div>
@endsection
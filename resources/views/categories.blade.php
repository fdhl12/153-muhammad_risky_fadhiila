@extends('layouts.app')
@section('content')
    <div class="container pt-16 mx-auto px-4">
        <x-nav-link href="/categories" class="hover:underline text-black">
            <h3 class="text-xl font-bold mb-4">Category</h3>
        </x-nav-link>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($categories as $category)
                <!-- Category Card -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <img src="{{ asset('images/' . $category->image) }}" alt="{{ $category->name }}" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h2 class="text-xl font-bold mb-2">{{ $category->name }}</h2>
                        <div class="flex justify-between items-center">
                            <a href="{{ route('categories.show', $category->id) }}" class="text-indigo-600 hover:text-indigo-800 mt-4 inline-block">List</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
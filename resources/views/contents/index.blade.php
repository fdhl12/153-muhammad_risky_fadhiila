@extends('layouts.app')
@section('content')
    <div class="container pt-16 mx-auto px-4">
        <x-nav-link href="/categories" class="hover:underline text-black">
            <h3 class="text-xl font-bold mb-4">Content</h3>
        </x-nav-link>
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
                        <a href="{{ route('contents.show', $content->id) }}" class="text-indigo-600 hover:text-indigo-800 mt-4 inline-block">
                            <h2 class="text-xl font-bold text-gray-900 mb-2">{{ $content->title }}</h2> </a>
                        <p class="text-gray-700 mb-4">{!! Str::limit($content->description) !!}</p>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">{{ $content->user->name }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div> 
            <div class="flex justify-between mt-4">
                <div>
                    <!-- Tombol Previous -->
                    @if ($contents->previousPageUrl())
                        <a href="{{ $contents->previousPageUrl() }}" class="px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">Previous</a>
                    @endif
                </div>
                <div>
                    <!-- Tombol Next -->
                    @if ($contents->nextPageUrl())
                        <a href="{{ $contents->nextPageUrl() }}" class="px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">Next</a>
                    @endif
                </div>
            </div>
    </div>

@endsection
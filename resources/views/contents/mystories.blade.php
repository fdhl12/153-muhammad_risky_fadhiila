@extends('layouts.app')
@section('content')
    <div class="container pt-16 mx-auto px-4">
        <x-nav-link href="/categories" class="hover:underline text-black">
            <h3 class="text-xl font-bold mb-4">My Story</h3>
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
                        <h2 class="text-xl font-bold mb-2">{{ $content->title }}</h2>
                        <p class="text-gray-700 mb-4">{!! $content->description !!}</p>
                        <div class="flex justify-between items-center">
                            <a href="{{ route('contents.show', $content->id) }}" class="text-indigo-600 hover:text-indigo-800 mt-4 inline-block">Read more</a>
                            <span class="text-gray-600">{{ $content->user->name }}</span>
                            @auth
                            @if(Auth::user()->role === 'user' && Auth::id() === $content->user_id)
                            <a href="{{ route('contents.edit', $content->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                <form action="{{ route('contents.destroy', $content->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            @endif
                        @endauth
                        </div>
                    </div>
                </div>
                @endforeach
            </div> 
            <!-- Pagination Links -->
        <div class="mt-4">
            {{ $contents->links() }}
        </div>
    </div>

@endsection
@extends('layouts.app')
@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-4">Kategori</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($categories as $category)
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-xl font-semibold mb-2">{{ $category->name }}</h2>
                    <a href="{{ route('categories.show', $category->id) }}" class="text-indigo-600 hover:text-indigo-800 mt-4 inline-block">Lihat Kategori</a>
                </div>
            @endforeach
            
        </div>
    </div>

@endsection
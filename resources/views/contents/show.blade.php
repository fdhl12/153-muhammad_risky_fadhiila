@extends('layouts.app')
@section('content')
    <div class="container mx-auto px-4">
        <div class="bg-white rounded-lg shadow-lg p-6">
            <h1 class="text-2xl font-bold mb-4">{{ $content->title }}</h1>
            <p class="text-gray-700 mb-4">{!! $content->description !!}</p>
            <p class="text-sm text-gray-500">Diposting oleh: {{ $content->user->name }}</p>
            <p class="text-sm text-gray-500">Kategori: {{ $content->category->name }}</p>
        </div>
    </div>
@endsection
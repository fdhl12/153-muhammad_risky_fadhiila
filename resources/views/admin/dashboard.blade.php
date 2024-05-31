@extends('layouts.app')
@section('content')
    <div class="container pt-16 mx-auto px-4">
        <div class="my-10 bg-white rounded-lg shadow-lg p-6">
            <x-nav-link href="/admin" class="hover:underline text-black">
                <h3 class="text-xl font-bold mb-4">Dashboard</h3>
            </x-nav-link>
            <p>Welcome to the admin dashboard, Hello {{ Auth::user()->name }}!</p>
        </div>
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="p-6">
                <h2 class="text-xl font-semibold mb-2">Users</h2>
                <p class="text-gray-700 mb-4">{{ $totalUsers }}</p>
                <div class="flex justify-between items-center">
                    <a href="/admin/users" class="text-indigo-600 hover:text-indigo-900">Read More</a>
                </div>
            </div>
        </div>
    
            {{-- card jumlah content --}}
        <div class="my-10 bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="p-6">
                <h2 class="text-xl font-semibold mb-2">Contents</h2>
                <p class="text-gray-700 mb-4">{{ $totalContents }}</p>
                <div class="flex justify-between items-center">
                    <a href="/admin/contents" class="text-indigo-600 hover:text-indigo-900">Read More</a>
                </div>
            </div>
        </div>
    
            <!-- Card jumlah category -->
        <div class="my-10 bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="p-6">
                <h2 class="text-xl font-semibold mb-2">Categories</h2>
                <p class="text-gray-700 mb-4">{{ $totalCategories }}</p>
                <div class="flex justify-between items-center">
                    <a href="/admin/categories" class="text-indigo-600 hover:text-indigo-900">Read More</a>
                </div>
            </div>
        </div>
    </div>
@endsection
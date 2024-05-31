@extends('layouts.app')
@section('content')
    <div class="container pt-16 mx-auto px-4">
        <div class="my-10 bg-white rounded-lg shadow-lg p-6">
            <x-nav-link href="/admin" class="hover:underline text-black">
                <h3 class="text-xl font-bold mb-4">Dashboard</h3>
            </x-nav-link>
            <p>Welcome to the admin dashboard, Hello {{ Auth::user()->name }}!</p>
        </div>

        <div class="flex flex-col md:flex-row items-center justify-between">

            
            <div class="my-10 w-80 bg-orange-400 rounded-lg shadow-lg overflow-hidden">
            <div class="p-6">
                <svg xmlns="http://www.w3.org/2000/svg" height="32" width="28" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
                <h2 class="text-xl text-white font-semibold mb-2">Users</h2>
                <p class="text-white mb-4">{{ $totalUsers }}</p>
                <div class="flex justify-between items-center">
                    <a href="/admin/users" class="text-white hover:underline">More</a>
                </div>
            </div>
        </div>
    
        {{-- card jumlah content --}}
        <div class="my-10 w-80 bg-orange-400 rounded-lg shadow-lg overflow-hidden">
            <div class="p-6">
                <svg xmlns="http://www.w3.org/2000/svg" height="32" width="32" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" d="M192 32c0 17.7 14.3 32 32 32c123.7 0 224 100.3 224 224c0 17.7 14.3 32 32 32s32-14.3 32-32C512 128.9 383.1 0 224 0c-17.7 0-32 14.3-32 32zm0 96c0 17.7 14.3 32 32 32c70.7 0 128 57.3 128 128c0 17.7 14.3 32 32 32s32-14.3 32-32c0-106-86-192-192-192c-17.7 0-32 14.3-32 32zM96 144c0-26.5-21.5-48-48-48S0 117.5 0 144V368c0 79.5 64.5 144 144 144s144-64.5 144-144s-64.5-144-144-144H128v96h16c26.5 0 48 21.5 48 48s-21.5 48-48 48s-48-21.5-48-48V144z"/></svg>
                <h2 class="text-xl text-white font-semibold mb-2">Contents</h2>
                <p class="text-white mb-4">{{ $totalContents }}</p>
                <div class="flex justify-between items-center">
                    <a href="/admin/contents" class="text-white hover:underline">More</a>
                </div>
            </div>
        </div>
        
            <!-- Card jumlah category -->
        <div class="my-10 w-80 bg-orange-400 rounded-lg shadow-lg overflow-hidden">
            <div class="p-6">
                <svg xmlns="http://www.w3.org/2000/svg" height="32" width="32" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" d="M40 48C26.7 48 16 58.7 16 72v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V72c0-13.3-10.7-24-24-24H40zM192 64c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zM16 232v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V232c0-13.3-10.7-24-24-24H40c-13.3 0-24 10.7-24 24zM40 368c-13.3 0-24 10.7-24 24v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V392c0-13.3-10.7-24-24-24H40z"/></svg>
                <h2 class="text-xl text-white font-semibold mb-2">Categories</h2>
                <p class="text-white mb-4">{{ $totalCategories }}</p>
                <div class="flex justify-between items-center">
                    <a href="/admin/categories" class="text-white hover:underline">More</a>
                </div>
            </div>
        </div>
    </div>

    </div>
@endsection
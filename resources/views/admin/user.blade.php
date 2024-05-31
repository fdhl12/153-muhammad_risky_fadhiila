@extends('layouts.app')
@section('content')
    <div class="container pt-16 mx-auto px-4">
        <div class="flex">
            <x-nav-link href="/admin" class="hover:underline text-black">
                <h3 class="text-xl font-bold mb-4">Dashboard</h3>
            </x-nav-link>
            <span class="text-gray-600 text-2xl mx-2">&gt;</span>
            <x-nav-link href="/admin/users" class="hover:underline text-black">
                <h3 class="text-xl font-bold mb-4">Manage Users</h3>
            </x-nav-link>
            <span class="text-gray-600 text-2xl mx-2">&gt;</span>
            <x-nav-link href="{{ route('admin.users.show', $user->username) }}" class="hover:underline text-black">
                <h3 class="text-xl font-bold mb-4">Details User</h3>
            </x-nav-link>
        </div>
        <div class="h-screen pt-12">

            <!-- Card start -->
                <div class="max-w-sm mx-auto rounded-lg overflow-hidden shadow-lg">
                    <div class="border-b px-4 pb-6">
                        <div class="text-center my-4">
                            <img class="h-32 w-32 rounded-full border-4 border-white dark:border-gray-800 mx-auto my-4"
                                src="{{ $user->photo_profile ? asset('storage/' . $user->photo_profile) : 'https://randomuser.me/api/portraits/women/21.jpg' }}" alt="">
                            <div class="py-2">
                                <h3 class="font-bold text-2xl text-gray-800 dark:text-white mb-1">{{ $user->name }}</h3>
                                <div class="flex text-gray-700 dark:text-gray-300 justify-center">
                                    {{ $user->username }}
                                </div>
                                <div class="inline-flex text-gray-700 dark:text-gray-300 items-center">
                                    {{ $user->email }}
                                </div>
                            </div>
                            <div class="inline-flex text-gray-700 dark:text-gray-300 items-center">
                                {{ $user->role }}
                            </div>
                            <div class=" text-gray-700 dark:text-gray-300 items-center">
                                {{ $user->created_at }}
                            </div>
                        </div>

                    <a href="/admin/users" class="text-indigo-600 hover:text-indigo-800 mt-4 inline-block">Back</a>
                    </div>
                    
                </div>
            <!-- Card end -->
        
        </div>
    </div>

@endsection
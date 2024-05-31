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


        <div class="bg-white rounded-lg shadow-lg m-4 relative overflow-hidden">
            <div class="relative">
                @if($content->image)
                <img src="{{ asset('storage/' . $content->image) }}" alt="Content Image" class="w-full h-64 object-cover rounded-t-lg">
                @else
                <img src="https://via.placeholder.com/400x200" alt="Placeholder Image" class="w-full h-64 object-cover rounded-t-lg">
                @endif
                <div class="absolute inset-0 bg-black opacity-50"></div>
                <div class="absolute bottom-0 left-0 p-6 text-white">
                    <div class="flex items-center">
                        @if($content->user->photo_profile)
                        <img src="{{ asset('storage/' . $content->user->photo_profile) }}" alt="User Profile Image" class="w-10 h-10 rounded-full mr-3">
                        @else
                        <img src="https://randomuser.me/api/portraits/women/21.jpg" alt="Placeholder Profile Image" class="w-10 h-10 rounded-full mr-3">
                        @endif
                        <div>
                    <a href="{{ route('profile.show', ['username' => $content->user->username]) }}">
                            <h2 class="text-lg font-bold">{{ $content->user->name }}</h2>
                        </a>
                            <p class="text-sm">{{ $content->created_at->format('M d, Y') }}</p>
                        </div>
                    </div>
                        <p class="text-sm mt-2">{{ $content->category->name }}</p>
                    
                    <div class="">
                        <p class="text-sm mt-1 mr-2">{{ $content->views }} views</p>
                    @auth
                <form action="{{ route('contents.like', $content->id) }}" method="POST" class="my-1">
                    @csrf
                    <button type="submit" class="text-indigo-600 hover:text-indigo-900 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#da0b0b" d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z"/></svg>
                        <span class="ml-2">{{ $content->reactions()->where('like', true)->count() }}</span>
                    </button>
                </form>
                @endauth
                    </div>
                    
                </div>
            </div>
            <div class="p-6">
                <h1 class="text-2xl font-bold mb-4">{{ $content->title }}</h1>
                <p class="text-gray-700 mb-6">{!! $content->description !!}</p>
        
                <div class="flex mt-3">
                    <!-- Modal toggle -->
                    <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                        Comment
                    </button>
                </div>
            </div>
        </div>
    
    <!-- Main modal -->
                <div id="authentication-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-md max-h-full">
                        <!-- Modal content -->
                      <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                          <!-- Modal header -->
                          <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                              <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                  Write a comment...
                                </h3>
                                <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-modal">
                                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-4 md:p-5">
                            
                            
                            <div class="mb-4">
                                <form action="{{ route('contents.comment', $content->id) }}" method="POST">
                                    @csrf
                                    <textarea name="comment" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required></textarea>
                                    <button type="submit" class="mt-2 px-4 py-2 bg-indigo-600 text-white rounded">Comment</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
                </div>
                
                    
            {{-- @endauth --}}
                <div class="bg-white rounded-lg shadow-lg p-6 m-4">
                    <h2 class="text-xl font-bold my-4">Comments</h2>
        @foreach($content->reactions->whereNotNull('comment') as $reaction)
            <div class="mb-4">
                <p class="text-sm text-gray-500">{{ $reaction->user->name }} | {{ $reaction->created_at }}</p>
                <p class="text-gray-700">{{ $reaction->comment }}</p>
            </div>
            @endforeach
        </div>
    </div>
    @endsection
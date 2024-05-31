

@extends('layouts.app')
@section('content')
<div class="container pt-16 mx-auto px-4">
    @auth
    @if(Auth::user()->role === 'admin')
    <div class="flex">
    <x-nav-link href="/admin" class="hover:underline text-black">
        <h3 class="text-xl font-bold mb-4">Dashboard</h3>
    </x-nav-link>
    <span class="text-gray-600 text-2xl mx-2">&gt;</span>
    <x-nav-link href="/admin/categories" class="hover:underline text-black">
        <h3 class="text-xl font-bold mb-4">Manage Category</h3>
    </x-nav-link>
    </div>
    <div class="items-end">
        <div class="mb-4">
            <form action="{{ route('admin.categories.index') }}" method="GET">
                <input type="text" name="query" placeholder="Search categories..." value="{{ $query ?? '' }}" class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none">
                <button type="submit" class="absolute right-0 top-0 mt-2 mr-4">
                    <svg class="text-gray-600 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                         xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
                         viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve"
                         width="512px" height="512px">
                        <path
                            d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23
                              s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92
                              c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17
                              s-7.626,17-17,17s-17-7.626-17-17S14.61,6,23.984,6z"/>
                    </svg>
                </button>
            </form>
        </div>
        <x-nav-link href="{{ route('categories.create') }}" class="hover:underline text-black">
            <p class="text-right text-xs leading-4 font-medium text-gray-600 mb-4">Create</p>
        </x-nav-link>
    </div>
    
    @endif
    @endauth
    

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-200 text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-200 text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-200 text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">Actions</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr class="{{ $loop->even ? 'bg-gray-100' : 'bg-white' }}">
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            <div class="text-sm leading-5 text-gray-900">{{ $category->id }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            <div class="text-sm leading-5 text-gray-900">{{ $category->name }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-medium">
                            @auth
                            @if(Auth::user()->role === 'admin')
                                <a href="{{ route('categories.show', $category->id) }}" class="text-orange-600 hover:text-orange-900">Details</a>
                                <a href="{{ route('categories.edit', $category->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>

                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                            @endif
                        @endauth
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
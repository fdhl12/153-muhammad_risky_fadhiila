@extends('layouts.app')

@section('content')
<div class="container pt-16 mx-auto px-4">
    <div class="mb-4">
        <form action="{{ route('admin.search') }}" method="GET">
            <input type="text" name="query" placeholder="Search..." value="{{ request()->input('query') }}" class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none">
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

    @if(isset($query))
        <h2 class="text-2xl font-bold mb-4">Search Results for "{{ $query }}"</h2>
    @endif

    <div class="grid grid-cols-1 gap-6">
        @if($users->isNotEmpty())
            <div>
                <h3 class="text-xl font-bold">Users</h3>
                <ul>
                    @foreach($users as $user)
                        <li>{{ $user->name }} ({{ $user->email }})</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if($categories->isNotEmpty())
            <div>
                <h3 class="text-xl font-bold">Categories</h3>
                <ul>
                    @foreach($categories as $category)
                        <li>{{ $category->name }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if($contents->isNotEmpty())
            <div>
                <h3 class="text-xl font-bold">Contents</h3>
                <ul>
                    @foreach($contents as $content)
                        <li>{{ $content->title }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if($users->isEmpty() && $categories->isEmpty() && $contents->isEmpty())
            <p>No results found.</p>
        @endif
    </div>
</div>
@endsection

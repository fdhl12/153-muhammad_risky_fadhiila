@extends('layouts.app')
@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-6">All Contents</h1>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="min-w-full bg-white">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="w-1/3 px-4 py-2">Title</th>
                    <th class="w-1/3 px-4 py-2">Category</th>
                    <th class="w-1/3 px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach($contents as $content)
                    <tr>
                        <td class="w-1/3 px-4 py-2">{{ $content->title }}</td>
                        <td class="w-1/3 px-4 py-2">{{ $content->category->name }}</td>
                        <td class="w-1/3 px-4 py-2">
                            <a href="{{ route('contents.show', $content->id) }}" class="text-blue-500">View</a>
                        <a href="{{ route('contents.edit', $content->id) }}" class="text-yellow-500">Edit</a>
                        <form action="{{ route('contents.destroy', $content->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500">Delete</button>
                        </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $contents->links() }}
    </div>
@endsection
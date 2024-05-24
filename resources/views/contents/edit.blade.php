<x-layout>

    <div class="mt-10 p-5 sm:mx-auto sm:w-full sm:max-w-100 rounded-sm border-orange-500 shadow-lg ">

        <form class="space-y-6" method="POST" action="{{ route('contents.update', $content->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="" >
                <label for="title" class="block text-xl font-medium leading-6 text-gray-900">Title</label>
                <div class="">
                    <input type="title" name="title" id="title" value="{{ old('title', $content->title) }}" required>
                </div>
            </div>
            <div class="">
                <label for="category_id" class="block text-xl font-medium leading-6 text-gray-900">Category</label>
                <select name="category_id" id="category_id" class="mt-1 block w-72" required>
                    <option value="">Select a category</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $content->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
                </select>
            </div>
            <div class="">
                <label for="description" class="block text-xl font-medium leading-6 text-gray-900" >Description</label>
                <textarea name="description" id="description" required>{{ old('bodies', $content->description) }}</textarea>
            </div>
            <div>
                <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
              </div>
            </form>
    </div>
    


</x-layout>
    
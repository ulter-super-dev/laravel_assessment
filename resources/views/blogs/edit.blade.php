<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Blog') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('blogs.update', $blog->id) }}" method="POST" class="max-w-md mx-auto m-5">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="mb-4">
                        <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                        <input type="text" id="title" title="title" name="title"
                            class="custom-input w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none @error('title') border-red-500 @enderror"
                            value="{{ old('title') || $blog->title }}" required>
                        @error('title')
                        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="content" class="block text-gray-700 text-sm font-bold mb-2">Content:</label>
                        <textarea id="content" name="content"
                            class="custom-input w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none @error('content') border-red-500 @enderror"
                            required>{{ old('content') || $blog->content }}</textarea>
                        @error('content')
                        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="category" class="block text-gray-700 text-sm font-bold mb-2">Category:</label>
                        <select id="category" name="category_id"
                            class="custom-input w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none @error('category') border-red-500 @enderror"
                            required>
                            <option value="null">Select a category</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $blog->category_id === $category->id ? 'selected' : '' }}>{{ $category->category }}
                            </option>
                            @endforeach
                        </select>
                        @error('category')
                        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <button type="submit" class="custom-btn">Submit</button>
                        &nbsp;
                        <a href="{{ route('blogs.index') }}">
                            <button class="custom-btn">Cancel</button>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Blog') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="/add-api" method="POST" class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-4">
                        <label for="title" class="block font-medium text-gray-700">Title</label>
                        <input id="title" type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                    <div class="mb-4">
                        <label for="content" class="block font-medium text-gray-700">Content</label>
                        <textarea id="content" type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" rows="8"></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="category" class="block font-medium text-gray-700">Category</label>
                        <select id="category" type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option>Gpting</option>
                            <option>Stackoverflowing</option>
                            <option>Scamming</option>
                        </select>
                    </div>
                    <div class="mb-4 flex justify-end">
                      <input type="submit" value="Add" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

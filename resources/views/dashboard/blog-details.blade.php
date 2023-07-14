<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blog Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-4">
                        <label for="title" class="block font-medium text-gray-700">Title</label>
                        <input id="title" type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" disabled>
                    </div>
                    <div class="mb-4">
                        <label for="content" class="block font-medium text-gray-700">Content</label>
                        <textarea id="content" type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" rows="8" disabled></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="category" class="block font-medium text-gray-700">Category</label>
                        <input id="category" type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" disabled>
                    </div>
                    <div class="mb-4 flex justify-end">
                        <label for="author" class="block font-medium text-gray-700">by Super Dev</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

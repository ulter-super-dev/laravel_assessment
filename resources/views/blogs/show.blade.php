<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blog Details') }}
        </h2>
    </x-slot>

    <div class="detail-card w-3/4 lg:w-1/2 bg-white mx-auto rounded-md m-20 p-10 text-center">
        <h1 class="text-3xl">{{ $blog->title }}</h1>
        <p class="text-gray-500 pb-4">{{ $blog->author->name }}</p>
        <div class="text-gray-700 mb-6 flex">
            <div style="word-break: break-all">
                {{ $blog->content }}
            </div>
        </div>

    </div>
</x-app-layout>
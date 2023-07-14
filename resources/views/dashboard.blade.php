<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <a 
                    class="p-6 bg-white border-b border-gray-200 flex justify-between hover:bg-gray-200 transition-all duration-300"
                    href="/edit-blog"
                >
                    <div class="font-bold text-lg"><i class="fa-solid fa-file-lines"></i> Hi, guys.</div>
                    <div class="font-bold text-sm text-gray-500">Anthony</div>
                </a>
                <a 
                    class="p-6 bg-white border-b border-gray-200 flex justify-between hover:bg-gray-200 transition-all duration-300"
                    href="/blog-details"
                >
                    <div class="font-bold text-lg"><i class="fa-solid fa-file-lines"></i> Cyberspace</div>
                    <div class="font-bold text-sm text-gray-500">Super Dev</div>
                </a>
                <a 
                    class="p-6 bg-white border-b border-gray-200 flex justify-between hover:bg-purple-200 transition-all duration-300 bg-purple-300"
                    href="/add-blog"
                >
                    <div class="font-bold text-lg"><i class="fas fa-plus-circle plus-icon"></i> Add New Blog</div>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blog Page') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-between">
                    <div class="flex justify-end m-5">
                        <form action="/blogs" method="GET">
                            <input type="text" placeholder="Search title" name="q" value="{{ $q }}"
                                class="px-4 py-2 border border-gray-300 rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <button type="submit"
                                class="px-4 py-2 bg-blue-500 text-white rounded-r-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                                Search
                            </button>
                        </form>
                    </div>
                    <div class="flex justify-end m-5">
                        <a href="/blogs/create"
                            class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                            Post Blog
                        </a>
                    </div>
                </div>
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                            <div class="overflow-hidden">
                                <table class="min-w-full divide-y divide-gray-200 mx-5">
                                    <thead>
                                        <tr>
                                            <th
                                                class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                <form action="/blogs" method="GET">
                                                    <input type="hidden" name="order_col" value="title"></input>
                                                    @if ($order_col != "title" || $order_col == "title" && $dir ==
                                                    "asc")
                                                    <input type="hidden" name="dir" value="desc"></input>
                                                    @elseif ($order_col == "title" && $dir == "desc")
                                                    <input type="hidden" name="dir" value="asc"></input>
                                                    @endif
                                                    <button>
                                                        <span class="inline-flex items-center">
                                                            Title
                                                            @if ($order_col == "title" && $dir == "asc")
                                                            <span class="ml-1">
                                                                <i class="fas fa-sort-desc text-gray-400"></i>
                                                            </span>
                                                            @elseif ($order_col == "title" && $dir == "desc")
                                                            <span class="ml-1">
                                                                <i class="fas fa-sort-asc text-gray-400"></i>
                                                            </span>
                                                            @else
                                                            <span class="ml-1">
                                                                <i class="fas fa-sort text-gray-400"></i>
                                                            </span>
                                                            @endif
                                                        </span>
                                                    </button>
                                                </form>
                                            </th>
                                            <th
                                                class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                <span class="inline-flex items-center">
                                                    Category
                                                </span>
                                            </th>
                                            <th
                                                class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                <span class="inline-flex items-center">
                                                    Author
                                                </span>
                                            </th>
                                            <th
                                                class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                <form action="/blogs" method="GET">
                                                    <input type="hidden" name="order_col" value="created_at"></input>
                                                    @if ($order_col != "created_at" || $order_col == "created_at" &&
                                                    $dir == "asc")
                                                    <input type="hidden" name="dir" value="desc"></input>
                                                    @elseif ($order_col == "created_at" && $dir == "desc")
                                                    <input type="hidden" name="dir" value="asc"></input>
                                                    @endif
                                                    <button>
                                                        <span class="inline-flex items-center">
                                                            Posted Date
                                                            @if ($order_col == "created_at" && $dir == "asc")
                                                            <span class="ml-1">
                                                                <i class="fas fa-sort-desc text-gray-400"></i>
                                                            </span>
                                                            @elseif ($order_col == "created_at" && $dir == "desc")
                                                            <span class="ml-1">
                                                                <i class="fas fa-sort-asc text-gray-400"></i>
                                                            </span>
                                                            @else
                                                            <span class="ml-1">
                                                                <i class="fas fa-sort text-gray-400"></i>
                                                            </span>
                                                            @endif
                                                        </span>
                                                    </button>
                                                </form>
                                            </th>
                                            <th
                                                class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Actions
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @if (count($blogs) > 0)
                                        @foreach($blogs as $blog)
                                        <tr class="hover:bg-gray-100">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <a href="/blogs/{{ $blog->id }}">
                                                {{ $blog->title }}
                                                </a>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ $blog->category->category }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ $blog->author->name }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ $blog->created_at }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex">
                                                    <form action="/blogs/{{$blog->id}}" method="POST" class="">
                                                        @csrf
                                                        {{ method_field('DELETE') }}
                                                        <button type="submit"
                                                            class="p-1 rounded-full bg-red-500 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">
                                                            <svg class="w-4 h-4 text-white" fill="currentColor"
                                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd"
                                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM5.707 5.293a1 1 0 111.414-1.414L10 8.586l2.879-2.879a1 1 0 111.414 1.414L11.414 10l2.879 2.879a1 1 0 11-1.414 1.414L10 11.414l-2.879 2.879a1 1 0 11-1.414-1.414L8.586 10 5.707 7.121a1 1 0 011.414-1.414L10 8.586z"
                                                                    clip-rule="evenodd"></path>
                                                            </svg>
                                                        </button>
                                                    </form>
                                                    <a href="/blogs/{{ $blog->id }}/edit"
                                                        class="p-1 rounded-full bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                                                        <svg class="w-4 h-4 text-white" fill="currentColor"
                                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd"
                                                                d="M2.414 17.414a1 1 0 001.414 0L17 4.828V3a1 1 0 00-1-1H15a1 1 0 00-1 1v1H4a1 1 0 00-1 1v9a1 1 0 001 1h9v1a1 1 0 01-1 1H5a1 1 0 01-1-1v-6a1 1 0 00-1-1H2.586a1 1 0 000 2H4v3a1 1 0 01-1 1H2.414a1 1 0 01-.707-1.707L5.586 12 2.707 9.121a1 1 0 010-1.414z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @else
                                        <tr class="hover:bg-gray-100 text-center">
                                            <td colspan=5>"No Data"</td>
                                        </tr>
                                        @endif
                                        <!-- Additional table rows -->
                                    </tbody>
                                </table>
                                {!! $blogs->render() !!}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
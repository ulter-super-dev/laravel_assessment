<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blog Page') }}
        </h2>

        <head>
            <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        </head>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg py-8">
                <div class="flex justify-between">
                    <div class="flex justify-end m-5">
                        <form action="/blogs" method="GET">
                            <input type="text" placeholder="Search Title" name="q" value="{{ $q }}" class="custom-input" />
                            &nbsp;&nbsp;
                            <button type="submit" class="custom-btn">Search</button>
                        </form>
                    </div>
                    <div class="flex justify-end m-5">
                        <a href="/blogs/create" class="custom-btn">Post Blog</a>
                    </div>
                </div>
                
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                            <div class="p-4 overflow-hidden">
                                <table class="min-w-full divide-y divide-gray-200">
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
                                                        <button type="submit" class="action-btn">
                                                            <span class="material-symbols-outlined">delete</span>
                                                        </button>
                                                    </form>
                                                    
                                                    <a href="/blogs/{{ $blog->id }}/edit" class="action-btn">
                                                        <span class="material-symbols-outlined">ink_pen</span>
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
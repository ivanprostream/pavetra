@extends('admin.layouts.app')
@section('title', 'Category show')

@section('main')

<div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

    <!-- Page header -->
    <div class="sm:flex sm:justify-between sm:items-center mb-5">

        <!-- Left: Title -->
        <div class="mb-4 sm:mb-0">
            <h1 class="text-2xl md:text-3xl text-gray-800 font-bold">{{ __('admin.problems') }}</h1>
        </div>

        <!-- Right: Actions -->
        <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">
            <!-- Add button -->
            <a class="btn bg-indigo-500 hover:bg-indigo-600 text-white" href="/admin/category_create">
                <svg class="w-4 h-4 fill-current opacity-50 shrink-0" viewBox="0 0 16 16">
                    <path d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z" />
                </svg>
                <span class="hidden xs:block ml-2">{{ __('admin.create') }}</span>
            </a>

        </div>

    </div>

    <!-- Table -->
    <div class="bg-white shadow-lg rounded-sm border border-gray-200 mb-8">
        <div x-data="handleSelect">

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="table-auto w-full">
                    <!-- Table header -->
                    <thead class="text-xs font-semibold uppercase text-gray-500 bg-gray-50 border-t border-b border-gray-200">
                        <tr>
                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-px">
                            </th>
                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="font-semibold text-left">{{ __('admin.image') }}</div>
                            </th>
                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap" style="width: 40%;">
                                <div class="font-semibold text-left">{{ __('admin.name') }}</div>
                            </th>
                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="font-semibold text-left">Actions</div>
                            </th>
                        </tr>
                    </thead>
                    <!-- Table body -->
                    <tbody class="text-sm divide-y divide-gray-200">
                        <!-- Row -->
                        @foreach ($category_list as $item)
                        <tr id="item-{{ $item->id }}">
                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-px">
                                <div class="flex items-center handle">
                                    <svg width="25" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-autofit-height" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M12 20h-6a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h6" />
                                        <path d="M18 14v7" />
                                        <path d="M18 3v7" />
                                        <path d="M15 18l3 3l3 -3" />
                                        <path d="M15 6l3 -3l3 3" />
                                    </svg>
                                </div>
                            </td>
                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                @if ($item->image)
                                    <img width="100" src="{{ asset('public/storage/'. $item->image) }}" alt="{{ $item->name }}">
                                @endif
                            </td>
                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="font-medium text-gray-800">
                                    <a target="_blank" href="{{ url($item->path) }}">{{ $item->name }}</a>
                                    <ul class="list-disc list-inside font-small">
                                        @foreach ( $item->children as $sub)
                                            <li>{{ $sub->name }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </td>
                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-px">
                                <div>
                                    <a class="inline text-gray-400 hover:text-gray-500" href="/admin/category_show/{{ $item->id }}">
                                        <span class="sr-only">{{ __('admin.show') }}</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-6 h-6 icon icon-tabler icon-tabler-list-details fill-current" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                            <path d="M13 5h8" />
                                            <path d="M13 9h5" />
                                            <path d="M13 15h8" />
                                            <path d="M13 19h5" />
                                            <rect x="3" y="4" width="6" height="6" rx="1" />
                                            <rect x="3" y="14" width="6" height="6" rx="1" />
                                        </svg>
                                    </a>

                                    <a class="inline-block text-gray-400 hover:text-gray-500" href="/admin/category_edit/{{ $item->id }}">
                                        <span class="sr-only">{{ __('admin.edit') }}</span>
                                        <svg class="w-8 h-8 fill-current inline-block" viewBox="0 0 32 32">
                                            <path d="M19.7 8.3c-.4-.4-1-.4-1.4 0l-10 10c-.2.2-.3.4-.3.7v4c0 .6.4 1 1 1h4c.3 0 .5-.1.7-.3l10-10c.4-.4.4-1 0-1.4l-4-4zM12.6 22H10v-2.6l6-6 2.6 2.6-6 6zm7.4-7.4L17.4 12l1.6-1.6 2.6 2.6-1.6 1.6z" />
                                        </svg>
                                    </a>

                                    <form method="POST" action="/admin/category_delete/{{ $item->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-red-500 hover:text-red-600 rounded-full">
                                            <span class="sr-only">{{ __('admin.delete') }}</span>
                                            <svg class="w-8 h-8 fill-current" viewBox="0 0 32 32">
                                                <path d="M13 15h2v6h-2zM17 15h2v6h-2z" />
                                                <path d="M20 9c0-.6-.4-1-1-1h-6c-.6 0-1 .4-1 1v2H8v2h1v10c0 .6.4 1 1 1h12c.6 0 1-.4 1-1V13h1v-2h-4V9zm-6 1h4v1h-4v-1zm7 3v9H11v-9h10z" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>

                <input type="hidden" id="sorting" name="sort" value="{{ $sort }}">

            </div>
        </div>
    </div>

</div>

@endsection('main')

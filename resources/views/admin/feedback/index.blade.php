@extends('admin.layouts.app')
@section('title', 'Feedback')

@section('main')

<div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

    <!-- Page header -->
    <div class="sm:flex sm:justify-between sm:items-center mb-5">

        <!-- Left: Title -->
        <div class="mb-4 sm:mb-0">
            <h1 class="text-2xl md:text-3xl text-gray-800 font-bold">{{ __('admin.feedback') }}</h1>
        </div>

    </div>

    <!-- Table -->
    <div class="bg-white shadow-lg rounded-sm border border-gray-200 mb-8">
        <div x-data="handleSelect">

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="table-auto w-full divide-y divide-gray-200">
                    <!-- Table header -->
                    <thead class="text-xs font-semibold uppercase text-gray-500 bg-gray-50 border-t border-b border-gray-200">
                        <tr>
                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="font-semibold text-left">{{ __('admin.date') }}</div>
                            </th>
                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="font-semibold text-left">{{ __('admin.name') }}</div>
                            </th>
                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="font-semibold text-left">{{ __('admin.phone') }}</div>
                            </th>
                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="font-semibold text-left">{{ __('admin.email') }}</div>
                            </th>
                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="font-semibold text-left">{{ __('admin.actions') }}</div>
                            </th>
                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <span class="sr-only">Menu</span>
                            </th>
                        </tr>
                    </thead>
                    <!-- Table body -->
                    @foreach ($messages_list as $item)
                    <tbody class="text-sm" x-data="{ open: false }">
                        <!-- Row -->
                        <tr>
                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                {{ $item->created_at }}
                            </td>
                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div>{{ $item->name }}</div>
                            </td>
                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="font-medium text-gray-800">{{ $item->phone }}</div>
                            </td>
                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="text-left font-medium text-green-500">{{ $item->email }}</div>
                            </td>
                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-px">
                                <div class="flex items-center">
                                    <button
                                        class="text-gray-400 hover:text-gray-500 transform"
                                        :class="{ 'rotate-180': open }"
                                        @click.prevent="open = !open"
                                        :aria-expanded="open"
                                        aria-controls="description-02"
                                    >
                                        <span class="sr-only">Menu</span>
                                        <svg class="w-8 h-8 fill-current" viewBox="0 0 32 32">
                                            <path d="M16 20l-5.4-5.4 1.4-1.4 4 4 4-4 1.4 1.4z" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <form method="POST" action="/admin/message_delete/{{ $item->id }}">
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
                            </td>
                        </tr>

                        <tr id="description-02" role="region" x-show="open" x-cloak>
                            <td colspan="10" class="px-2 first:pl-5 last:pr-5 py-3">
                                <div class="flex items-center bg-gray-50 p-3 -mt-3">
                                    <div class="italic">{{ $item->message }}</div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>

</div>

@endsection('main')

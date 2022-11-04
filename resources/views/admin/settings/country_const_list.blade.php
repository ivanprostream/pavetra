@extends('admin.layouts.app')
@section('title', 'Lang List')

@section('main')

    <!-- Page header -->
    <div class="mb-8">
        <!-- Title -->
        <h1 class="text-2xl md:text-3xl text-gray-800 font-bold">{{ __('admin.localization') }}</h1>
        @include('admin.partials.flash-message')
    </div>

    <div class="bg-white shadow-lg rounded-sm mb-8">
        <div class="flex flex-col md:flex-row md:-mr-px">

            <!-- Sidebar -->
            <div class="flex flex-nowrap overflow-x-scroll no-scrollbar md:block md:overflow-auto px-3 py-6 border-b md:border-b-0 md:border-r border-gray-200 min-w-60 md:space-y-3">
                <!-- Group 1 -->
                <div>
                    <ul class="flex flex-nowrap md:block mr-3 md:mr-0">
                        <li class="mr-0.5 md:mr-0 md:mb-0.5">
                            <a class="flex items-center px-2.5 py-2 rounded whitespace-nowrap " :class="settingsPanel === 'account' && 'bg-indigo-50'" href="{{ route('localization') }}">
                                <svg class="w-4 h-4 shrink-0 fill-current mr-2" :class="settingsPanel === 'plans' && 'bg-indigo-50'" viewBox="0 0 16 16">
                                    <path d="M5 9h11v2H5V9zM0 9h3v2H0V9zm5 4h6v2H5v-2zm-5 0h3v2H0v-2zm5-8h7v2H5V5zM0 5h3v2H0V5zm5-4h11v2H5V1zM0 1h3v2H0V1z" />
                                </svg>
                                <span class="text-sm font-medium text-gray-600" :class="settingsPanel === 'account' ? 'text-indigo-500' : 'hover:text-gray-700'">{{ __('admin.countries') }}</span>
                            </a>
                        </li>
                        <li class="mr-0.5 md:mr-0 md:mb-0.5">
                            <a class="flex items-center px-2.5 py-2 rounded whitespace-nowrap" :class="settingsPanel === 'notifications' && 'bg-indigo-50'" href="/admin/lang_list">
                                <svg class="w-4 h-4 shrink-0 fill-current mr-2" :class="settingsPanel === 'notifications' && 'text-indigo-400'" viewBox="0 0 16 16">
                                    <path d="M14.3.3c.4-.4 1-.4 1.4 0 .4.4.4 1 0 1.4l-8 8c-.2.2-.4.3-.7.3-.3 0-.5-.1-.7-.3-.4-.4-.4-1 0-1.4l8-8zM15 7c.6 0 1 .4 1 1 0 4.4-3.6 8-8 8s-8-3.6-8-8 3.6-8 8-8c.6 0 1 .4 1 1s-.4 1-1 1C4.7 2 2 4.7 2 8s2.7 6 6 6 6-2.7 6-6c0-.6.4-1 1-1z" />
                                </svg>
                                <span class="text-sm font-medium text-gray-500 " :class="settingsPanel === 'notifications' ? 'text-indigo-500' : 'hover:text-gray-700'">{{ __('admin.languages') }}</span>
                            </a>
                        </li>
                        <li class="mr-0.5 md:mr-0 md:mb-0.5">
                            <a class="flex items-center px-2.5 py-2 rounded whitespace-nowrap bg-indigo-50" :class="settingsPanel === 'notifications' && 'bg-indigo-50'" href="/admin/country_const_list">
                                <svg class="shrink-0 h-4 w-4 mr-2 text-indigo-400" viewBox="0 0 24 24">
                                    <circle class="fill-current text-indigo-400" :class="page.startsWith('utility-') && 'text-indigo-300'" cx="18.5" cy="5.5" r="4.5" />
                                    <circle class="fill-current text-indigo-600" :class="page.startsWith('utility-') && 'text-indigo-500'" cx="5.5" cy="5.5" r="4.5" />
                                    <circle class="fill-current text-indigo-600" :class="page.startsWith('utility-') && 'text-indigo-500'" cx="18.5" cy="18.5" r="4.5" />
                                    <circle class="fill-current text-indigo-400" :class="page.startsWith('utility-') && 'text-indigo-300'" cx="5.5" cy="18.5" r="4.5" />
                                </svg>
                                <span class="text-sm font-medium text-indigo-600" :class="settingsPanel === 'notifications' ? 'text-indigo-500' : 'hover:text-gray-700'">{{ __('admin.constants') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>

            </div>

            <!-- Panel -->
            <div class="grow">
                <!-- Panel body -->
                <div class="p-6 space-y-6">
                    <section>
                        <h3 class="text-xl leading-snug text-gray-800 font-bold mb-1">{{ __('admin.constants') }}</h3>
                        <ul>
                            @foreach ($country_const_list as $item)
                            <li class="md:flex md:justify-between md:items-center py-3 border-b border-gray-200">
                                <!-- Left -->
                                <div class="text-sm text-gray-800 font-medium">{{ $item->const_info->name }} - {{ $item->name }} </div>
                                <!-- Right -->
                                <div class="text-sm text-gray-800ml-4">
                                    <span class="mr-3"></span>

                                    <form method="POST" action="/admin/country_const_delete/{{ $item->id }}">
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
                            </li>
                            @endforeach
                        </ul>
                    </section>
                </div>

                <!-- Panel footer -->
                <footer>
                    <div class="px-6 py-8 border-t border-gray-200">
                        <h3 class="text-xl leading-snug text-gray-800 font-bold mb-1">{{ __('admin.add') }}</h3>
                        <form action="/admin/country_const_new" method="POST">
                            @csrf
                            <div class="sm:flex sm:items-center space-y-4 sm:space-y-0 sm:space-x-4 mt-5">
                                <div class="sm:w-1/3">
                                    <label class="block text-sm font-medium mb-1" for="user_name">{{ __('admin.link') }}</label>
                                    <input id="country" class="form-input w-full" name="name" type="text" placeholder="{{ __('admin.link') }}" value="{{ old('name') }}" />
                                    @error('name')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="sm:w-1/4">
                                    <label class="block text-sm font-medium mb-1" for="lang">{{ __('admin.type') }}</label>
                                    <select id="lang" class="form-select w-full" name="country_const_type_id">
                                        @foreach ($country_const_type as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('lang_id')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                    <input type="hidden" name="lang_id" value="{{ $user->country_id }}">
                                </div>

                                <div class="sm:w-1/3">
                                    <button class="btn bg-indigo-500 hover:bg-indigo-600 text-white ml-2 mt-6">{{ __('admin.add') }}</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </footer>

            </div>

        </div>
    </div>


@endsection('main')

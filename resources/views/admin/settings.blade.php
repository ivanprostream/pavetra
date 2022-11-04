@extends('admin.layouts.app')
@section('title', 'Settings')

@section('main')

    <!-- Page header -->
    <div class="mb-8">
        <!-- Title -->
        <h1 class="text-2xl md:text-3xl text-gray-800 font-bold">{{ __('admin.account_settings') }}</h1>
        @include('admin.partials.flash-message')
    </div>

    <div class="bg-white shadow-lg rounded-sm mb-8">
        <div class="flex flex-col md:flex-row md:-mr-px">

            <!-- Sidebar -->
            <div class="flex flex-nowrap overflow-x-scroll no-scrollbar md:block md:overflow-auto px-3 py-6 border-b md:border-b-0 md:border-r border-gray-200 min-w-60 md:space-y-3">
                <!-- Group 1 -->
                <div>
                    <div class="text-xs font-semibold text-gray-400 uppercase mb-3">{{ __('admin.settings') }}</div>
                    <ul class="flex flex-nowrap md:block mr-3 md:mr-0">
                        <li class="mr-0.5 md:mr-0 md:mb-0.5">
                            <a class="flex items-center px-2.5 py-2 rounded whitespace-nowrap bg-indigo-50" href="{{ route('settings') }}">
                                <svg class="w-4 h-4 shrink-0 fill-current mr-2 text-indigo-400" viewBox="0 0 16 16">
                                    <path d="M12.311 9.527c-1.161-.393-1.85-.825-2.143-1.175A3.991 3.991 0 0012 5V4c0-2.206-1.794-4-4-4S4 1.794 4 4v1c0 1.406.732 2.639 1.832 3.352-.292.35-.981.782-2.142 1.175A3.942 3.942 0 001 13.26V16h14v-2.74c0-1.69-1.081-3.19-2.689-3.733zM6 4c0-1.103.897-2 2-2s2 .897 2 2v1c0 1.103-.897 2-2 2s-2-.897-2-2V4zm7 10H3v-.74c0-.831.534-1.569 1.33-1.838 1.845-.624 3-1.436 3.452-2.422h.436c.452.986 1.607 1.798 3.453 2.422A1.943 1.943 0 0113 13.26V14z" />
                                </svg>
                                <span class="text-sm font-medium text-indigo-500">{{ __('admin.my_account') }}</span>
                            </a>
                        </li>
                        <li class="mr-0.5 md:mr-0 md:mb-0.5">
                            <a class="flex items-center px-2.5 py-2 rounded whitespace-nowrap" :class="settingsPanel === 'notifications' && 'bg-indigo-50'" href="/admin/change_password">
                                <svg class="w-4 h-4 shrink-0 fill-current text-gray-400 mr-2" :class="settingsPanel === 'notifications' && 'text-indigo-400'" viewBox="0 0 16 16">
                                    <path d="M14.3.3c.4-.4 1-.4 1.4 0 .4.4.4 1 0 1.4l-8 8c-.2.2-.4.3-.7.3-.3 0-.5-.1-.7-.3-.4-.4-.4-1 0-1.4l8-8zM15 7c.6 0 1 .4 1 1 0 4.4-3.6 8-8 8s-8-3.6-8-8 3.6-8 8-8c.6 0 1 .4 1 1s-.4 1-1 1C4.7 2 2 4.7 2 8s2.7 6 6 6 6-2.7 6-6c0-.6.4-1 1-1z" />
                                </svg>
                                <span class="text-sm font-medium text-gray-600" :class="settingsPanel === 'notifications' ? 'text-indigo-500' : 'hover:text-gray-700'">{{ __('admin.change_password') }}</span>
                            </a>
                        </li>

                    </ul>
                </div>

            </div>

            <!-- Panel -->
            <div class="grow">
                <form action="/admin/settings/{{ $user->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <!-- Panel body -->
                    <div class="p-6 space-y-6">
                        <h2 class="text-2xl text-gray-800 font-bold mb-5">{{ __('admin.my_account') }}</h2>

                            <!-- Business Profile -->
                            <section>
                                <h3 class="text-xl leading-snug text-gray-800 font-bold mb-1">{{ __('admin.personal_data') }}</h3>

                                <div class="sm:flex sm:items-center space-y-4 sm:space-y-0 sm:space-x-4 mt-5">
                                    <div class="sm:w-1/3">
                                        <label class="block text-sm font-medium mb-1" for="user_name">{{ __('admin.user_name') }}</label>
                                        <input id="user_name" class="form-input w-full" name="name" type="text" placeholder="{{ __('admin.user_name') }}" value="{{ old('name', $user->name) }}" />
                                        @error('name')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="sm:w-1/3">
                                        <label class="block text-sm font-medium mb-1" for="business-id">{{ __('admin.phone') }}</label>
                                        <input id="phone" class="form-input w-full" name="phone" type="text" placeholder="{{ __('admin.phone') }}" value="{{ old('phone', $user->phone) }}" />
                                        @error('phone')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="sm:w-1/3">
                                        <label class="block text-sm font-medium mb-1" for="gender">{{ __('admin.gender') }}</label>
                                        <select id="gender" class="form-select w-full" name="gender">
                                            <option value="1" {{  $user->gender === 1 ? "selected" : "" }}>{{ __('admin.man') }}</option>
                                            <option value="0" {{  $user->gender === 0 ? "selected" : "" }}>{{ __('admin.woman') }}</option>
                                        </select>
                                        @error('gender')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </section>

                            <!-- Email -->
                            <section>
                                <h3 class="text-xl leading-snug text-gray-800 font-bold mb-1">{{ __('admin.local_data') }}</h3>
                                <div class="text-sm">{{ __('admin.local_data_text') }}</div>
                                <div class="sm:flex sm:items-center space-y-4 sm:space-y-0 sm:space-x-4 mt-5">
                                    <div class="sm:w-1/3">
                                        <label class="block text-sm font-medium mb-1" for="email">{{ __('admin.email_adress') }}</label>
                                        <input disabled id="email" class="form-input w-full disabled:border-gray-200 disabled:bg-gray-100 disabled:text-gray-400 disabled:cursor-not-allowed" name="email" type="email" value="{{ old('email', $user->email) }}" />
                                    </div>
                                    <div class="sm:w-1/3">
                                        <label class="block text-sm font-medium mb-1" for="country-id">{{ __('admin.country') }}</label>
                                        <input disabled id="country_id" class="form-input w-full disabled:border-gray-200 disabled:bg-gray-100 disabled:text-gray-400 disabled:cursor-not-allowed" type="text"  value="{{ $user->country_info->name }}" />
                                    </div>
                                    <div class="sm:w-1/3">
                                        <label class="block text-sm font-medium mb-1" for="lang">{{ __('admin.lang') }}</label>
                                        <select id="lang" class="form-select w-full" name="lang_id">
                                            @foreach ($lang_list as $item)
                                                <option value="{{ $item->id }}" {{  $user->lang_id === $item->id ? "selected" : "" }}>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('lang_id')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </section>

                    </div>

                    <!-- Panel footer -->
                    <footer>
                        <div class="flex flex-col px-6 py-5 border-t border-gray-200">
                            <div class="flex self-end">
                                {{-- <button class="btn border-gray-200 hover:border-gray-300 text-gray-600">{{ __('admin.cancel') }}</button> --}}
                                <button class="btn bg-indigo-500 hover:bg-indigo-600 text-white ml-3">{{ __('admin.save_changes') }}</button>
                            </div>
                        </div>
                    </footer>
                </form>

            </div>

        </div>
    </div>


@endsection('main')

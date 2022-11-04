@extends('admin.layouts.app')
@section('title', 'User create')

@section('main')

<form action="/admin/user_create" method="POST" autocomplete="off">
    @csrf
    <!-- Panel body -->
    <div class="p-6 space-y-6">
        <h2 class="text-2xl text-gray-800 font-bold mb-5">{{ __('admin.add_user') }}</h2>

            <!-- Business Profile -->
            <section>
                <h3 class="text-xl leading-snug text-gray-800 font-bold mb-1">{{ __('admin.personal_data') }}</h3>

                <div class="sm:flex sm:items-center space-y-4 sm:space-y-0 sm:space-x-4 mt-5">
                    <div class="sm:w-1/3">
                        <label class="block text-sm font-medium mb-1" for="user_name">{{ __('admin.user_name') }}</label>
                        <input id="user_name" class="form-input w-full" name="name" type="text" placeholder="{{ __('admin.user_name') }}" value="{{ old('name') }}" />
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="sm:w-1/3">
                        <label class="block text-sm font-medium mb-1" for="business-id">{{ __('admin.phone') }}</label>
                        <input id="phone" class="form-input w-full" name="phone" type="text" placeholder="{{ __('admin.phone') }}" value="{{ old('phone') }}" />
                        @error('phone')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="sm:w-1/3">
                        <label class="block text-sm font-medium mb-1" for="gender">{{ __('admin.gender') }}</label>
                        <select id="gender" class="form-select w-full" name="gender">
                            <option value="1">{{ __('admin.man') }}</option>
                            <option value="0">{{ __('admin.woman') }}</option>
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
                <div class="sm:flex sm:items-center space-y-4 sm:space-y-0 sm:space-x-4 mt-5">
                    <div class="sm:w-1/3">
                        <label class="block text-sm font-medium mb-1" for="country">{{ __('admin.country') }}</label>
                        <select id="country" class="form-select w-full" name="country_id">
                            @foreach ($country_list as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('country_id')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="sm:w-1/3">
                        <label class="block text-sm font-medium mb-1" for="lang">{{ __('admin.lang') }}</label>
                        <select id="lang" class="form-select w-full" name="lang_id">
                            @foreach ($lang_list as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('lang_id')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </section>
            <!-- Email -->
            <section>
                <h3 class="text-xl leading-snug text-gray-800 font-bold mb-1">{{ __('admin.permissions') }}</h3>
                <div class="sm:flex sm:items-center space-y-4 sm:space-y-0 sm:space-x-4 mt-5">
                    <div class="sm:w-1/3">
                        <label class="block text-sm font-medium mb-1" for="email">{{ __('admin.email_adress') }}</label>
                        <input id="email" class="form-input w-full" name="email" type="email" placeholder="{{ __('admin.email_adress') }}" value="{{ old('email') }}" />
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="sm:w-1/3">
                        <label class="block text-sm font-medium mb-1" for="password">{{ __('admin.password') }}</label>
                        <input id="password" class="form-input w-full" name="password" type="password" placeholder="{{ __('admin.password') }}" value="{{ old('password') }}" data-lpignore="true" autocomplete="off" autofocus="" />
                        @error('password')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="sm:w-1/3">
                        <label class="block text-sm font-medium mb-1" for="password_confirmation">{{ __('admin.password') }}</label>
                        <input id="password_confirmation" class="form-input w-full" name="password_confirmation" type="password" placeholder="{{ __('admin.password') }}" value="{{ old('password_confirmation') }}" data-lpignore="true" autocomplete="off" autofocus="" />
                        @error('password_confirmation')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="sm:w-1/3">
                        <label class="block text-sm font-medium mb-1" for="role">{{ __('admin.permission') }}</label>
                        <select id="role" class="form-select w-full" name="role">
                            @foreach ($roles as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('role')
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
                <button class="btn bg-indigo-500 hover:bg-indigo-600 text-white ml-3">{{ __('admin.create') }}</button>
            </div>
        </div>
    </footer>
</form>

@endsection('main')

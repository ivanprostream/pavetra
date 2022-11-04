@extends('admin.layouts.app')
@section('title', 'Edit language')

@section('main')

    <!-- Page header -->
    <div class="mb-8">
        <!-- Title -->
        <h1 class="text-2xl md:text-3xl text-gray-800 font-bold">{{ __('admin.edit') }}: {{ $lang_data->name }}</h1>
        @include('admin.partials.flash-message')
    </div>

    <div class="bg-white shadow-lg rounded-sm mb-8">
        <div class="flex flex-col md:flex-row md:-mr-px">



            <!-- Panel -->
            <div class="grow">
                <!-- Panel footer -->
                <footer>
                    <div class="px-6 py-8 border-t border-gray-200">
                        <form action="/admin/lang_edit/{{ $lang_data->id }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="sm:flex sm:items-center space-y-4 sm:space-y-0 sm:space-x-4 mt-5">
                                <div class="sm:w-1/4">
                                    <label class="block text-sm font-medium mb-1" for="user_name">{{ __('admin.lang') }}</label>
                                    <input id="name" class="form-input w-full" name="name" type="text" placeholder="{{ __('admin.lang') }}" value="{{ old('name', $lang_data->name) }}" />
                                    @error('name')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="sm:w-1/4">
                                    <label class="block text-sm font-medium mb-1" for="business-id">{{ __('admin.identifier') }}</label>
                                    <input id="identifier" class="form-input w-full" name="url" type="text" placeholder="{{ __('admin.identifier') }}" value="{{ old('url', $lang_data->url) }}" />
                                    @error('url')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="sm:w-1/4">
                                    <button class="btn bg-indigo-500 hover:bg-indigo-600 text-white ml-2 mt-6">{{ __('admin.update') }}</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </footer>

            </div>

        </div>
    </div>


@endsection('main')

@extends('admin.layouts.app')
@section('title', 'Category create')

@section('main')

<div class="bg-white">

<form action="/admin/category_create" method="POST" autocomplete="off" enctype="multipart/form-data">
    @csrf
    <!-- Panel body -->
    <div class="p-6 space-y-6">
        <h2 class="text-2xl text-gray-800 font-bold mb-5">{{ __('admin.add_category') }}</h2>

            <!-- Business Profile -->
            <section>
                <h3 class="text-xl leading-snug text-gray-800 font-bold mb-1">{{ __('admin.content') }}</h3>

                <div class="sm:flex sm:items-center space-y-4 sm:space-y-0 sm:space-x-4 mt-5">
                    <div class="sm:w-1/3">
                        <label class="block text-sm font-medium mb-1" for="name">{{ __('admin.name') }}</label>
                        <input id="name" class="form-input w-full" name="name" type="text" placeholder="{{ __('admin.name') }}" value="{{ old('name') }}" />
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                        <div class="mt-3">
                            <label class="block text-sm font-medium mb-1" for="url">Url</label>
                            <input id="url" class="form-input w-full" name="url" type="text" placeholder="Url" value="{{ old('url') }}" />
                            @error('url')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="sm:w-1/3">
                        <label class="block text-sm font-medium mb-1" for="short_text">{{ __('admin.short_text') }}</label>
                        <textarea class="form-input w-full" name="short_text" cols="30" rows="5">{{ old('short_text') }}</textarea>
                        @error('short_text')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="sm:w-1/3">
                        <label class="block text-sm font-medium mb-1" for="image">{{ __('admin.image') }}</label>
                        <input type="file" class="border border-gray-200 rounded p-2 w-full" name="image"/>
                        @error('image')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="mt-5">
                    <textarea name="content" id="summernote" cols="30" rows="20" class="form-input w-full">{{ old('content') }}</textarea>
                    @error('content')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

            </section>

            <!-- Email -->
            <section>
                <h3 class="text-xl leading-snug text-gray-800 font-bold mb-1">SEO</h3>
                <div class="sm:flex sm:items-center space-y-4 sm:space-y-0 sm:space-x-4 mt-5">
                    <div class="sm:w-1/3">
                        <label class="block text-sm font-medium mb-1" for="meta_title">Meta title</label>
                        <input id="meta_title" class="form-input w-full" name="meta_title" type="text" placeholder="Meta title" value="{{ old('meta_title') }}" />
                        @error('meta_title')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="sm:w-1/3">
                        <label class="block text-sm font-medium mb-1" for="meta_description">Meta description</label>
                        <textarea class="form-input w-full" name="meta_description" cols="30" rows="2">{{ old('meta_description') }}</textarea>
                        @error('meta_description')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="sm:w-1/3">
                        <label class="block text-sm font-medium mb-1" for="meta_keywords">Meta keywords</label>
                        <textarea class="form-input w-full" name="meta_keywords" cols="30" rows="2">{{ old('meta_description') }}</textarea>
                        @error('meta_keywords')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </section>
            <!-- Email -->
            <section>
                <h3 class="text-xl leading-snug text-gray-800 font-bold mb-1">{{ __('admin.settings') }}</h3>
                <div class="sm:flex sm:items-center space-y-4 sm:space-y-0 sm:space-x-4 mt-5">
                    <div class="sm:w-1/3">
                        <label class="block text-sm font-medium mb-1" for="lang">{{ __('admin.country') }}</label>
                        <select id="lang" class="form-select w-full" name="lang_id">
                            @foreach ($country_list as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('lang_id')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="sm:w-1/3">
                        <label class="block text-sm font-medium mb-1" for="parent">{{ __('admin.parent_category') }}</label>
                        <select id="parent" class="form-select w-full" name="parent">
                            <option value="">{{ __('admin.without_parent') }}</option>
                            @foreach ($category_list as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('parent')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="sm:w-1/3">
                        <label class="block text-sm font-medium mb-1" for="is_active">{{ __('admin.display') }}</label>
                        <select id="is_active" class="form-select w-full" name="is_active">
                            <option value="1">{{ __('admin.show') }}</option>
                            <option value="0">{{ __('admin.not_show') }}</option>
                        </select>
                        @error('is_active')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="sm:w-1/3">
                        <label class="block text-sm font-medium mb-1" for="in_tags">{{ __('admin.placement') }}</label>
                        <select id="in_tags" class="form-select w-full" name="in_tags">
                            <option value="0">{{ __('admin.show_nowhere') }}</option>
                            <option value="1">{{ __('admin.show_in_home') }}</option>
                            <option value="2">{{ __('admin.show_in_sidebar') }}</option>
                            <option value="3">{{ __('admin.show_everywhere') }}</option>
                        </select>
                        @error('in_tags')
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

</div>

@endsection('main')

@extends('admin.layouts.app')
@section('title', 'Blog Edit')

@section('main')

<div class="bg-white">

<form action="/admin/blog_edit/{{ $blog_data->id }}" method="POST" autocomplete="off" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <!-- Panel body -->
    <div class="p-6 space-y-6">
        <h2 class="text-2xl text-gray-800 font-bold mb-5">{{ __('admin.edit_blog') }}</h2>

            <!-- Business Profile -->
            <section>
                <h3 class="text-xl leading-snug text-gray-800 font-bold mb-1">{{ __('admin.content') }}</h3>

                <div class="sm:flex sm:items-center space-y-4 sm:space-y-0 sm:space-x-4 mt-5">
                    <div class="sm:w-1/3">
                        <label class="block text-sm font-medium mb-1" for="name">{{ __('admin.name') }}</label>
                        <input id="name" class="form-input w-full" name="name" type="text" placeholder="{{ __('admin.name') }}" value="{{ old('name', $blog_data->name) }}" />
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                        <div class="mt-3">
                            <label class="block text-sm font-medium mb-1" for="url">Url</label>
                            <input id="url" class="form-input w-full" name="url" type="text" placeholder="Url" value="{{ old('url', $blog_data->url) }}" />
                            @error('url')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="sm:w-1/3">
                        <label class="block text-sm font-medium mb-1" for="short_text">{{ __('admin.short_text') }}</label>
                        <textarea class="form-input w-full" name="short_text" cols="30" rows="5">{{ old('short_text', $blog_data->short_text) }}</textarea>
                        @error('short_text')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="sm:w-1/3">
                        <label class="block text-sm font-medium mb-1" for="image">{{ __('admin.image') }}</label>
                        <input type="file" class="border border-gray-200 rounded p-2 w-full" name="image"/>
                        @if ( $blog_data->image )
                            <img width="100" src="{{ asset('public/storage/'. $blog_data->image) }}" alt="{{ $blog_data->name }}">
                        @endif
                        @error('image')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="mt-5">
                    <textarea name="content" id="summernote" cols="30" rows="20" class="form-input w-full">{{ old('content', $blog_data->content) }}</textarea>
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
                        <input id="meta_title" class="form-input w-full" name="meta_title" type="text" placeholder="Meta title" value="{{ old('meta_title', $blog_data->meta_title) }}" />
                        @error('meta_title')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="sm:w-1/3">
                        <label class="block text-sm font-medium mb-1" for="meta_description">Meta description</label>
                        <textarea class="form-input w-full" name="meta_description" cols="30" rows="2">{{ old('meta_description', $blog_data->meta_description) }}</textarea>
                        @error('meta_description')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="sm:w-1/3">
                        <label class="block text-sm font-medium mb-1" for="meta_keywords">Meta keywords</label>
                        <textarea class="form-input w-full" name="meta_keywords" cols="30" rows="2">{{ old('meta_description', $blog_data->meta_keywords) }}</textarea>
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
                                <option {{  $item->id === $blog_data->lang_id ? "selected" : "" }} value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('lang_id')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="sm:w-1/3">
                        <label class="block text-sm font-medium mb-1" for="category_id">{{ __('admin.parent_category') }}</label>
                        <select id="category_id" class="form-select w-full" name="category_id">
                            <option value="">{{ __('admin.select_category') }}</option>
                            @foreach ($category_list as $item)
                            <optgroup label="{{ $item->name }}">
                                @foreach ($item->children as $child)
                                <option {{  $child->id === $blog_data->category_id ? "selected" : "" }} value="{{ $child->id }}">{{ $child->name }}</option>
                                @endforeach
                            </optgroup>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="sm:w-1/3">
                        <label class="block text-sm font-medium mb-1" for="is_active">{{ __('admin.display') }}</label>
                        <select id="is_active" class="form-select w-full" name="is_active">
                            <option {{  1 === $blog_data->is_active ? "selected" : "" }} value="1">{{ __('admin.show') }}</option>
                            <option {{  0 === $blog_data->is_active ? "selected" : "" }} value="0">{{ __('admin.not_show') }}</option>
                        </select>
                        @error('is_active')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="sm:w-1/3">
                        <label class="block text-sm font-medium mb-1" for="psych_id">{{ __('admin.author') }}</label>
                        <select id="psych_id" class="form-select w-full" name="psych_id">
                            <option value="">{{ __('admin.without_author') }}</option>
                            @foreach ($author_list as $author)
                            <option {{  $author->id === $blog_data->psych_id ? "selected" : "" }} value="{{ $author->id }}">{{ $author->name }}</option>
                            @endforeach
                        </select>
                        @error('psych_id')
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
                <button class="btn bg-indigo-500 hover:bg-indigo-600 text-white ml-3">{{ __('admin.update') }}</button>
            </div>
        </div>
    </footer>
</form>

</div>

@endsection('main')

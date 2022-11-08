@extends('site.layouts.app')
@section('title', $category_data->meta_title)
@section('description', $category_data->meta_description)
@section('keywords', $category_data->meta_keywords)

@section('main')


    @include('site.sections.page-header')

    <section class="pxp-page-header-simple" style="background-color: var(--pxpSecondaryColor);">
        <div class="pxp-container">
            <h1>{{ $category_data->name }}</h1>
            <div class="pxp-hero-subtitle pxp-text-light">{{ $category_data->short_text }}</div>
            <div class="pxp-hero-form pxp-hero-form-round pxp-large mt-3 mt-lg-4">
                <form class="row gx-3 align-items-center">
                    <div class="col-12 col-lg">
                        <div class="input-group mb-3 mb-lg-0">
                            <span class="input-group-text"><span class="fa fa-search"></span></span>
                            <input type="text" class="form-control" placeholder="Поиск по ключевым словам">
                        </div>
                    </div>
                    <div class="col-12 col-lg pxp-has-left-border">
                        <div class="input-group mb-3 mb-lg-0">
                            <span class="input-group-text"><span class="fa fa-folder-o"></span></span>
                            <select class="form-select">
                                <option selected>Выберите категорию</option>
                                @foreach ($parent_categories as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-lg-auto">
                        <button>Поиск</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    @if (!empty($category_data->children))

    <section class="mt-100">
        <div class="pxp-container">
            <div class="row">
                @foreach ($category_data->children as $child)
                <div class="col-md-6 col-xl-4 col-xxl-3 pxp-companies-card-1-container">
                    <div class="pxp-companies-card-1 pxp-has-border">
                        <div class="pxp-companies-card-1-top">
                            @if (!empty($child->image))
                            <a href="/{{ $child->path }}" class="pxp-companies-card-1-company-logo" style="background-image: url({{ asset('public/storage/'. $child->image) }});"></a>
                            @endif
                            <a href="/{{ $child->path }}" class="pxp-companies-card-1-company-name">{{ $child->name }}</a>
                            <div class="pxp-companies-card-1-company-description pxp-text-light">{{ $child->short_text }}</div>
                        </div>
                        <div class="pxp-companies-card-1-bottom">
                            <a href="/{{ $child->path }}" class="pxp-companies-card-1-company-jobs">Подробнее</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <section class="mt-100">
        <div class="pxp-container">
            <div class="row justify-content-center">
                <div class="col-xl-9 col-xxl-9">
                    <div class="mt-4 mt-md-5">
                        {!! $category_data->content !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('site.sections.footer')
    @include('site.partials.modal')

@endsection('main')

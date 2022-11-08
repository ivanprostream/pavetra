@extends('site.layouts.app')
@section('title', $page_data->meta_title)
@section('description', $page_data->meta_description)
@section('keywords', $page_data->meta_keywords)

@section('main')



    @if (empty($page_data->image))

    @include('site.sections.page-header')

    <section class="mb-100" style="background-color: var(--pxpMainColorTransparent);">
        <div class="pxp-container">
            <div class="pxp-blog-hero text-center">
                <h1>{{ $page_data->name }}</h1>
            </div>
        </div>
    </section>
    @else

    @include('site.sections.home-header')

    <section class="pxp-page-image-hero pxp-cover" style="background-image: url({{ asset('public/storage/'. $page_data->image) }});">
        <div class="pxp-hero-opacity"></div>
        <div class="pxp-page-image-hero-caption">
            <div class="pxp-container">
                <div class="row justify-content-center">
                    <div class="col-9 col-md-8 col-xl-7 col-xxl-6">
                        <h1 class="text-center">{{ $page_data->name }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif




    <section class="mt-100">
        <div class="pxp-container">
            <div class="row justify-content-center">
                <div class="col-xl-9 col-xxl-9">
                    <p class="pxp-text-light text-center">{{ $page_data->short_text }}</p>

                    <div class="mt-4 mt-md-5">
                        {!! $page_data->content !!}
                    </div>
                </div>
            </div>
        </div>
    </section>


    @include('site.sections.footer')
    @include('site.partials.modal')

@endsection('main')

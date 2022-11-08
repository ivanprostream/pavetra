@extends('site.layouts.app')
@section('title', $page_data->meta_title)
@section('description', $page_data->meta_description)
@section('keywords', $page_data->meta_keywords)

@section('main')


    @include('site.sections.page-header')

    <section>
        <div class="pxp-container">
            <div class="pxp-blog-hero">
                <h1>{{ $page_data->name }}</h1>
                <div class="pxp-hero-subtitle pxp-text-light">{{ $page_data->short_text }}</div>
            </div>

            <div>
                <div class="row">
                    <div class="col-lg-7 col-xl-8 col-xxl-9">
                        <div class="row">
                            @foreach ($last_articles as $article)

                            @endforeach
                            <div class="col-md-6 col-lg-12 col-xl-6 col-xxl-4 pxp-posts-card-1-container">
                                <div class="pxp-posts-card-1 pxp-has-border">
                                    <div class="pxp-posts-card-1-top">
                                        <div class="pxp-posts-card-1-top-bg">
                                            @if (!empty($article->image))
                                            <div class="pxp-posts-card-1-image pxp-cover" style="background-image: url({{ asset('public/storage/'. $article->image) }});"></div>
                                            @endif
                                            <div class="pxp-posts-card-1-info">
                                                <div class="pxp-posts-card-1-date">{{ $article->created_at }}</div>
                                                <a href="/{{ $article->category->path }}" class="pxp-posts-card-1-category">{{ $article->category->name }}</a>
                                            </div>
                                        </div>
                                        <div class="pxp-posts-card-1-content">
                                            <a href="/{{ $article->path }}" class="pxp-posts-card-1-title">{{ $article->name }}</a>
                                            <div class="pxp-posts-card-1-summary pxp-text-light">{{ $article->short_text }}</div>
                                        </div>
                                    </div>
                                    <div class="pxp-posts-card-1-bottom">
                                        <div class="pxp-posts-card-1-cta">
                                            <a href="/{{ $article->path }}">Подробнее<span class="fa fa-angle-right"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row mt-4 mt-lg-5 justify-content-between align-items-center">
                            <div class="col-auto">
                                <nav class="mt-3 mt-sm-0" aria-label="Blog articles pagination">
                                    <ul class="pagination pxp-pagination">
                                        <li class="page-item active" aria-current="page">
                                            <span class="page-link">1</span>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-xl-4 col-xxl-3">
                        <div class="pxp-blogs-list-side-panel">
                            <h3>Поиск по статьям</h3>
                            <div class="mt-2 mt-lg-3">
                                <div class="input-group">
                                    <span class="input-group-text"><span class="fa fa-search"></span></span>
                                    <input type="text" class="form-control" placeholder="Введите ключевое слово">
                                </div>
                            </div>

                            <h3 class="mt-3 mt-lg-4">Категории</h3>
                            <ul class="list-unstyled pxp-blogs-side-list mt-2 mt-lg-3">
                                @foreach ($parent_categories as $category)
                                <li><a href="/{{ $category->path }}">{{ $category->name }}</a></li>
                                @endforeach
                            </ul>

                            <h3 class="mt-3 mt-lg-4">Популярные фразы</h3>
                            <div class="mt-2 mt-lg-3 pxp-blogs-side-tags">
                                @foreach ($tags as $tag)
                                <a href="/{{ $tag->path }}">{{ $tag->short_text }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('site.sections.footer')
    @include('site.partials.modal')

@endsection('main')

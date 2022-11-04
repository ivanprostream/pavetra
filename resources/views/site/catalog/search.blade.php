@extends('site.layouts.app')
@section('title', '')

@section('main')

    @include('site.sections.page-header')

    <section class="mt-100 pxp-no-hero">
        <div class="pxp-container">
            <h2 class="pxp-section-h2 text-center">В разработке</h2>
            <p class="pxp-text-light text-center">Мы трудимся день и ночь чтобы запустить самый полезный сервис для людей.</p>

            <div class="pxp-404-fig text-center mt-4 mt-lg-5">
                <img src="{{ asset('public/img/404.png') }}" alt="Page not found">
            </div>

            <div class="mt-4 mt-lg-5 text-center">
                <a href="{{ route('home') }}" class="btn rounded-pill pxp-section-cta">{{ __('site.go_home') }}<span class="fa fa-angle-right"></span></a>
            </div>
        </div>
    </section>

    @include('site.sections.footer')
    @include('site.partials.modal')

@endsection('main')

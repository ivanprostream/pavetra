@extends('site.layouts.app')
@section('title', '')

@section('main')



@include('site.sections.page-header')

    <section class="mt-80 pxp-no-hero">
        <div class="pxp-container">
            <h2 class="pxp-section-h2 text-center">{{ $page_data->name }}</h2>

            @include('site.partials.flash-message')

            <div class="row mt-4 mt-md-5 justify-content-center pxp-animate-in pxp-animate-in-top">

                @foreach ($contact_list as $item)
                <div class="col-lg-4 pxp-contact-card-1-container">
                    <a href="#" class="pxp-contact-card-1">
                        <div class="pxp-contact-card-1-icon-container">
                            <div class="pxp-contact-card-1-icon">
                                <span class="{{ $item->const_info->icon }}"></span>
                            </div>
                        </div>
                        <div class="pxp-contact-card-1-title">{{ $item->name }}</div>
                    </a>
                </div>
                @endforeach

            </div>

            <div class="row mt-100 justify-content-center pxp-animate-in pxp-animate-in-top">

                <div class="col-lg-6">
                    <div class="pxp-contact-us-form pxp-has-animation pxp-animate">
                        <h2 class="pxp-section-h2 text-center">Связаться с нами</h2>
                        <form class="mt-4" method="POST" action="{{ route('send_message') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="contact-us-name" class="form-label">Ваше имя</label>
                                <input type="text" class="form-control" id="contact-us-name" placeholder="Ваше имя" name="name" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                <div class="error">
                                    {{ $errors->first('name') }}
                                </div>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="contact-us-name" class="form-label">Телефон</label>
                                <input type="text" class="form-control" id="contact-us-name" placeholder="Ваше телефон" name="phone" value="{{ old('phone') }}">
                                @if ($errors->has('phone'))
                                <div class="error">
                                    {{ $errors->first('phone') }}
                                </div>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="contact-us-email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="contact-us-email" placeholder="Ваш e-mail" name="email" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                <div class="error">
                                    {{ $errors->first('email') }}
                                </div>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="contact-us-message" class="form-label">Сообщение</label>
                                <textarea class="form-control" id="contact-us-message" placeholder="Ваше сообщение" name="message">{{ old('message') }}</textarea>
                                <input type="hidden" name="lang_id" value="1">
                                <input type="text" name="trap" value="" style="height: 0px; opacity:0;">
                                @if ($errors->has('message'))
                                <div class="error">
                                    {{ $errors->first('message') }}
                                </div>
                                @endif
                            </div>
                            <div class="text-right">
                                <button  class="btn rounded-pill pxp-section-cta d-block">Отправить</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <div class="row mt-100 justify-content-center pxp-animate-in pxp-animate-in-top">
                {!! $page_data->content !!}
            </div>
        </div>
    </section>

    @include('site.sections.footer')
    @include('site.partials.modal')

@endsection('main')

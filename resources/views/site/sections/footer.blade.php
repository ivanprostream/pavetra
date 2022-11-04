<footer class="pxp-main-footer mt-100">
    <div class="pxp-main-footer-top pt-100 pb-100" style="background-color:var(--pxpMainColorLight);">
        <div class="pxp-container">
            <div class="row">
                <div class="col-lg-6 col-xl-5 col-xxl-4 mb-4">
                    <div class="pxp-footer-logo">
                        <a href="/" class="pxp-animate"><img width="120" src="{{ asset('img/logo-blue.png') }}"></a>
                    </div>
                    <div class="pxp-footer-section mt-3 mt-md-4">
                        <div class="pxp-footer-phone">(123) 456-7890</div>
                    </div>
                    <div class="mt-3 mt-md-4 pxp-footer-section">
                        <div class="pxp-footer-text">
                            {!! __('site.cookie_text') !!}
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-7 col-xxl-8">
                    <div class="row">
                        @foreach ($footer_menu as $item)
                        <div class="col-md-6 col-xl-4 col-xxl-3 mb-4">
                            <div class="pxp-footer-section">
                                <h3>{{ $item->name }}</h3>
                                <ul class="pxp-footer-list">
                                    @foreach ($item->children as $child)
                                    <li><a href="/{{ $child->path }}">{{ $child->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pxp-main-footer-bottom" style="background-color: var(--pxpLightGrayColor);">
        <div class="pxp-container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-auto">
                    <div class="pxp-footer-copyright">{{ date('Y') }} Pavetra © {{ __('site.all_right_reserved') }}</div>
                </div>
                <div class="col-lg-auto">
                    <div class="pxp-footer-social mt-3 mt-lg-0">
                        <ul class="list-unstyled">
                            <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                            <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                            <li><a href="#"><span class="fa fa-instagram"></span></a></li>
                            <li><a href="#"><span class="fa fa-linkedin"></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

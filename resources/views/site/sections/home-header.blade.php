<header class="pxp-header fixed-top">
    <div class="pxp-container">
        <div class="pxp-header-container">
            <div class="pxp-logo">
                <a href="/" class="pxp-animate"><img class="header-logo" width="140" src="{{ asset('public/img/logo-white.png') }}"></a>
            </div>
            <div class="pxp-nav-trigger navbar d-xl-none flex-fill">
                <a role="button" data-bs-toggle="offcanvas" data-bs-target="#pxpMobileNav" aria-controls="pxpMobileNav">
                    <div class="pxp-line-1"></div>
                    <div class="pxp-line-2"></div>
                    <div class="pxp-line-3"></div>
                </a>
                <div class="offcanvas offcanvas-start pxp-nav-mobile-container" tabindex="-1" id="pxpMobileNav">
                    <div class="offcanvas-header">
                        <div class="pxp-logo">
                            <a href="/" class="pxp-animate"><img class="header-logo" width="140" src="{{ asset('public/img/logo-blue.png') }}"></a>
                        </div>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <nav class="pxp-nav-mobile">
                            <ul class="navbar-nav justify-content-end flex-grow-1">

                                @foreach ($header_menu as $item)
                                @if ($item->parent == NULL)
                                    <li class="nav-item"><a href="{{ $item->path }}">{{ $item->name }}</a></li>
                                @else
                                    <li class="nav-item dropdown">
                                        <a role="button" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">О проекте</a>
                                        <ul class="dropdown-menu">
                                            @foreach ($item->children as $child)
                                            <li class="nav-item"><a href="{{ $child->path }}">{{ $child->name }}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endif
                                @endforeach

                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <nav class="pxp-nav pxp-light dropdown-hover-all d-none d-xl-block mt-2">
                <ul>
                    @foreach ($header_menu as $item)
                    @if (count($item->children) == 0)
                        <li><a href="{{ $item->path }}">{{ $item->name }}</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">{{ $item->name }}</a>
                            <ul class="dropdown-menu">
                                @foreach ($item->children as $child)
                                <li><a class="dropdown-item" href="{{ $child->path }}">{{ $child->name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    @endif
                    @endforeach

                </ul>
            </nav>
            <nav class="pxp-user-nav d-none d-sm-flex mt-2">
                <a class="btn rounded-pill pxp-nav-btn" href="{{ route('search') }}">Подобрать психолога</a>
                {{-- <a class="btn rounded-pill pxp-user-nav-trigger" data-bs-toggle="modal" href="#pxp-check-modal" role="button">Войти</a> --}}
            </nav>
        </div>
    </div>
</header>

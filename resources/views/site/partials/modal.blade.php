<div class="modal fade pxp-user-modal" id="pxp-check-modal" aria-hidden="true" aria-labelledby="signinModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="pxp-user-modal-fig text-center">
                    <img src="{{ asset('img/signin-fig.png') }}" alt="Sign in">
                </div>
                <h5 class="modal-title text-center mt-4 mb-4" id="signinModal">Авторизация</h5>
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">По телефону</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">По паролю</button>
                  </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="form-floating mb-3">
                        <div class="pxp-hero-form pxp-hero-form-round mt-3 mt-lg-4">
                            <form class="row gx-3 align-items-center" action="jobs-list-1.html">
                                <div class="col-12 col-sm">
                                    <div class="mb-3 mb-sm-0">
                                        <input type="text" class="form-control" placeholder="Номер вашего телефона">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-auto">
                                    <button type="button" onclick="showInput()" class="pxp-width-auto">Получить код</button>
                                </div>
                                <script type="text/javascript">
                                    function showInput() {
                                      $("#show-input").css('display','block');
                                    }
                                </script>
                            </form>
                        </div>
                        <div class="mb-3 mt-3">
                            <input type="checkbox" class="form-check-input" id="checkbox-notification">
                            <label for="checkbox-notification" class="form-label pxp-text-small" style="width: 90%;margin-left: 10px;">Я принимаю условия использования, соглашаюсь с политикой конфиденциальности Pavetra, соглашаюсь на обработку персональных данных и на получение СМС-паролей, а также иных информационных и сервисных сообщений на указанный номер телефона</label>
                        </div>
                    </div>
                    <div class="form-floating mb-3" style="display: none;" id="show-input">
                        <div class="pxp-hero-form pxp-hero-form-round mt-3 mt-lg-4">
                            <form class="row gx-3 align-items-center">
                                <div class="col-12 col-sm">
                                    <div class="mb-3 mb-sm-0">
                                        <input type="text" class="form-control" placeholder="СМС код">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-auto">
                                    <button type="button" class="pxp-width-auto">Авторизоваться</button>
                                </div>
                            </form>
                        </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                      <form class="mt-4">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="pxp-signin-email" placeholder="Email">
                            <label for="pxp-signin-email">Email</label>
                            <span class="fa fa-envelope-o"></span>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="pxp-signin-password" placeholder="Пароль">
                            <label for="pxp-signin-password">Пароль</label>
                            <span class="fa fa-lock"></span>
                        </div>
                        <div class="mb-3 mt-3">
                            <input type="checkbox" class="form-check-input" id="checkbox-notification">
                            <label for="checkbox-notification" class="form-label pxp-text-small" style="width: 90%;margin-left: 10px;">Я принимаю условия использования, соглашаюсь с политикой конфиденциальности Pavetra, соглашаюсь на обработку персональных данных и на получение СМС-паролей, а также иных информационных и сервисных сообщений на указанный номер телефона</label>
                        </div>
                        <a href="user-profile.html" class="btn rounded-pill pxp-modal-cta">Войти</a>
                        <div class="mt-4 text-center pxp-modal-small">
                            <a href="#" class="pxp-modal-link">Забыл пароль</a>
                        </div>
                        <div class="mt-4 text-center pxp-modal-small">
                            Первый раз на Pavetra? <a role="button" class="" data-bs-target="#pxp-signup-modal" data-bs-toggle="modal" data-bs-dismiss="modal">Создать аккаунт</a>
                        </div>
                    </form>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade pxp-user-modal" id="pxp-signin-modal" aria-hidden="true" aria-labelledby="signinModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="pxp-user-modal-fig text-center">
                    <img src="{{ asset('img/signin-fig.png') }}" alt="Sign in">
                </div>
                <h5 class="modal-title text-center mt-4" id="signinModal">Приветствуем!</h5>
                <form class="mt-4">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="pxp-signin-email" placeholder="Email">
                        <label for="pxp-signin-email">Email</label>
                        <span class="fa fa-envelope-o"></span>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="pxp-signin-password" placeholder="Пароль">
                        <label for="pxp-signin-password">Пароль</label>
                        <span class="fa fa-lock"></span>
                    </div>
                    <a href="user-profile.html" class="btn rounded-pill pxp-modal-cta">Войти</a>
                    <div class="mt-4 text-center pxp-modal-small">
                        <a href="#" class="pxp-modal-link">Забыл пароль</a>
                    </div>
                    <div class="mt-4 text-center pxp-modal-small">
                        Первый раз на Pavetra? <a role="button" class="" data-bs-target="#pxp-signup-modal" data-bs-toggle="modal" data-bs-dismiss="modal">Создать аккаунт</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

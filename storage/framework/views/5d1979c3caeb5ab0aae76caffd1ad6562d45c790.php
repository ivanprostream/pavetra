<?php $__env->startSection('title', $page_data->meta_title); ?>
<?php $__env->startSection('description', $page_data->meta_description); ?>
<?php $__env->startSection('keywords', $page_data->meta_keywords); ?>

<?php $__env->startSection('main'); ?>

    <?php echo $__env->make('site.sections.home-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


        <section class="pxp-hero pxp-hero-bg pxp-cover" style="background-image: url(<?php echo e(asset('public/storage/'. $page_data->image)); ?>);">
            <div class="pxp-hero-opacity"></div>
            <div class="pxp-hero-caption">
                <div class="pxp-container">
                    <div class="row justify-content-center">
                        <div class="col-12 col-xl-10 col-xxl-9">
                            <h1 class="text-white text-center">Помощь настоящих психологов</h1>

                            <div class="pxp-hero-form pxp-hero-form-round pxp-large mt-4 mt-lg-5">
                                <form class="row gx-3 align-items-center" action="<?php echo e(route('search')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <div class="col-12 col-lg">
                                        <div class="input-group mb-3 mb-lg-0">
                                            <span class="input-group-text"><span class="fa fa-list-ul"></span></span>
                                            <select class="form-select">
                                                <option selected="">Категория</option>
                                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg pxp-has-left-border">
                                        <div class="input-group mb-3 mb-lg-0">
                                            <span class="input-group-text"><span class="fa fa-thumb-tack"></span></span>
                                            <select class="form-select">
                                                <option selected="">Проблема</option>
                                                <option>Кризисная ситуация (развод, расставание, измена, конфликты, беременность, увольнение, смерть близкого, переезд и т.д.)</option>
                                                <option>Тяжелые эмоции и состояния (тревожность, страх, депрессия, гнев, раздражение, вина, стыд и др.)</option>
                                                <option>Эмоциональное выгорание, прокрастинация, хроническая усталость, потеря себя, смысла жизни, отсутствие мотивации</option>
                                                <option>Низкая самооценка, синдром самозванца, неуверенность в себе и своих силах</option>
                                                <option>Расстройство пищевого поведения у взрослых (РПП), неудовлетворенность собой, своим телом, весом</option>
                                                <option>Посттравматическое стрессовое расстройство (ПТСР), кПТСР и детские травмы</option>
                                                <option>Психосоматика</option>
                                                <option>Эмоциональная (любовная) зависимость</option>
                                                <option>Помощь тяжелобольным и родственникам тяжелобольных</option>
                                                <option>Помощь родственникам зависимых</option>
                                                <option>Сексология</option>
                                                <option>Нейропсихология (взрослые)</option>
                                                <option>Психологическая диагностика</option>
                                                <option>Другое</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg pxp-has-left-border">
                                        <div class="input-group mb-3 mb-lg-0">
                                            <span class="input-group-text"><span class="fa fa-clock-o"></span></span>
                                            <select class="form-select">
                                                <option selected="">Срочность</option>
                                                <option>Не спешу, хочу спокойно выбрать</option>
                                                <option>Нужна срочная помощь. Чем быстрее, тем лучше</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg pxp-has-left-border">
                                        <div class="input-group mb-3 mb-lg-0">
                                            <span class="input-group-text"><span class="fa fa-comments-o"></span></span>
                                            <select class="form-select">
                                                <option selected="">Онлайн / оффлайн</option>
                                                <option>ОНЛАЙН (дистанционно, удаленно, из любой точки мира)</option>
                                                <option>ОФЛАЙН (в кабинете, в конкретном городе)</option>
                                                <optgroup label="Беларусь">
                                                    <option>Минск</option>
                                                    <option>Витебск</option>
                                                    <option>Брест</option>
                                                </optgroup>
                                                <optgroup label="Украина">
                                                    <option>Киев</option>
                                                    <option>Харьков</option>
                                                    <option>Одесса</option>
                                                </optgroup>
                                                <optgroup label="Россия">
                                                    <option>Москва</option>
                                                    <option>Санкт-Петербург</option>
                                                    <option>Самара</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-auto">
                                        <a href="<?php echo e(route('search')); ?>">
                                            <button type="button" id="search-btn">Найти</button>
                                        </a>
                                    </div>
                                </form>
                            </div>

                            <div class="pxp-hero-form-filter mt-3 mt-lg-4 pxp-has-border">
                                <div class="row justify-content-center">
                                    <div class="col-12 col-md-3">
                                        <div class="mb-3 mb-lg-0">
                                            <select class="form-select">
                                                <option>Пол психолога</option>
                                                <option>Пол неважен, лишь бы помог</option>
                                                <option>Психолог-мужчина</option>
                                                <option>Психолог-женщина</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <div class="mb-3 mb-lg-0">
                                            <select class="form-select">
                                                <option>Направление</option>
                                                <option>Не разбираюсь или не имеет значения (лишь бы помогло)</option>
                                                <option>Экзистенциальная терапия, логотерапия</option>
                                                <option>Когнитивно-поведенческая терапия (КПТ, КБТ)</option>
                                                <option>Рационально-эмотивно поведенческая психология (РЭПТ)</option>
                                                <option>Психоаналитическая терапия, юнгианская психология</option>
                                                <option>Эмоционально-образная терапия</option>
                                                <option>Психоанализ</option>
                                                <option>Символдрама</option>
                                                <option>Семейная системная психотерапия</option>
                                                <option>Семейная системная терапия субличностей (IFS)</option>
                                                <option>Гештальт-терапия</option>
                                                <option>Эриксоновский гипноз</option>
                                                <option>НЛП</option>
                                                <option>Телесно-ориентированная терапия</option>
                                                <option>Танцевально-двигательная терапия</option>
                                                <option>Транзактный (трансактный) анализ</option>
                                                <option>Арт-терапия</option>
                                                <option>Клиническая психология</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <div class="mb-3 mb-lg-0">
                                            <select class="form-select">
                                                <option selected>Квалификация психолога</option>
                                                <option value="1">Профессиональный психолог</option>
                                                <option value="2">Студент психологического факультета</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <div class="mb-3 mb-lg-0">
                                            <select class="form-select">
                                                <option selected="">Язык общения</option>
                                                <option value="1">Беларуская мова</option>
                                                <option value="2">Українська мова</option>
                                                <option value="3">English</option>
                                                <option value="4">Русский язык</option>
                                                <option value="5">Język polski</option>
                                                <option value="5">Español</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="pxp-hero-searches-container">
                                <div class="pxp-hero-subtitle text-white text-center mb-3 mb-lg-4">Проблемы, которые волнуют чаще всего</div>
                                <div class="pxp-hero-searches">
                                    <div class="pxp-hero-searches-items pxp-text-center">
                                        <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a href="/<?php echo e($tag->path); ?>"><?php echo e($tag->short_text); ?></a>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="mt-100">
            <div class="pxp-container">
                <div class="row justify-content-between align-items-center mt-4 mt-md-5">
                    <div class="col-lg-6 col-xxl-5">
                        <div class="pxp-info-fig pxp-animate-in pxp-animate-in-right">
                            <div class="pxp-info-fig-image pxp-cover" style="background-image: url(<?php echo e(asset('img/psy.jpg')); ?>);"></div>
                            <div class="pxp-info-stats">
                                <div class="pxp-info-stats-item pxp-animate-in pxp-animate-bounce">
                                    <div class="pxp-info-stats-item-number">100+<span>психологов</span></div>
                                    <div class="pxp-info-stats-item-description">работают с нами</div>
                                </div>
                                <div class="pxp-info-stats-item pxp-animate-in pxp-animate-bounce">
                                    <div class="pxp-info-stats-item-number">> 75 %<span> клиентов</span></div>
                                    <div class="pxp-info-stats-item-description">нашли своего психолога тут</div>
                                </div>
                                <div class="pxp-info-stats-item pxp-animate-in pxp-animate-bounce">
                                    <div class="pxp-info-stats-item-number">7 из 10<span>клиентов</span></div>
                                    <div class="pxp-info-stats-item-description">чувствуют улучшения после первого месяца</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-xxl-6">
                        <div class="pxp-info-caption pxp-animate-in pxp-animate-in-top mt-4 mt-sm-5 mt-lg-0">
                            <h2 class="pxp-section-h2 mb-4">Найдите своего<br>психолога на Pavetra</h2>
                            <p class="pxp-text-light"><?php echo $page_data->short_text; ?></p>
                            <?php echo $page_data->content; ?>

                            <div class="pxp-info-caption-cta">
                                <a href="" class="btn rounded-pill pxp-section-cta">Подобрать своего психолога<span class="fa fa-angle-right"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="mt-100 pt-100 pb-100" style="background-color: var(--pxpSecondaryColorLight);">
            <div class="pxp-container">
                <h2 class="pxp-section-h2 text-center mb-4">С чем помогают психологи</h2>
                <br>
                <div class="row justify-content-evenly mt-4 mt-md-5 pxp-animate-in pxp-animate-in-top">
                    <div class="col-lg-3 col-xl-3 pxp-services-1-item-container">
                        <div class="pxp-services-1-item text-center">
                            <div class="pxp-services-1-item-icon">
                                <img src="<?php echo e(asset('img/icons/icon-1.png')); ?>" alt="Найти себя">
                            </div>
                            <div class="pxp-services-1-item-title">Найти и глубже узнать себя</div>
                            <div class="pxp-services-1-item-text pxp-text-light">Разобраться в себе и своих желаниях</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xl-3 pxp-services-1-item-container">
                        <div class="pxp-services-1-item text-center">
                            <div class="pxp-services-1-item-icon">
                                <img src="<?php echo e(asset('img/icons/icon-8.png')); ?>" alt="Понять психосоматику">
                            </div>
                            <div class="pxp-services-1-item-title">Понять психосоматику, справиться с РПП</div>
                            <div class="pxp-services-1-item-text pxp-text-light">Услышать свое тело и помочь себе быть здоровым</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xl-3 pxp-services-1-item-container">
                        <div class="pxp-services-1-item text-center">
                            <div class="pxp-services-1-item-icon">
                                <img src="<?php echo e(asset('img/icons/icon-3.png')); ?>" alt="Пережить расставание">
                            </div>
                            <div class="pxp-services-1-item-title">Пережить расставание, развод, кризис</div>
                            <div class="pxp-services-1-item-text pxp-text-light">Выйти из кризисной ситуации обновленным и с желанием жить дальше</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xl-3 pxp-services-1-item-container">
                        <div class="pxp-services-1-item text-center">
                            <div class="pxp-services-1-item-icon">
                                <img src="<?php echo e(asset('img/icons/icon-4.png')); ?>" alt="Повысить самооценку">
                            </div>
                            <div class="pxp-services-1-item-title">Повысить самооценку и поверить в себя</div>
                            <div class="pxp-services-1-item-text pxp-text-light">Понять, откуда растут ноги у неуверенности в себе, и преодолеть ее</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xl-3 pxp-services-1-item-container">
                        <div class="pxp-services-1-item text-center">
                            <div class="pxp-services-1-item-icon">
                                <img src="<?php echo e(asset('img/icons/icon-2.png')); ?>" alt="Справиться с тревогой, страхами, депрессией">
                            </div>
                            <div class="pxp-services-1-item-title">Справиться с тревогой, страхами, депрессией</div>
                            <div class="pxp-services-1-item-text pxp-text-light">Найти их причины и разрешить внутренние конфликты</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xl-3 pxp-services-1-item-container">
                        <div class="pxp-services-1-item text-center">
                            <div class="pxp-services-1-item-icon">
                                <img src="<?php echo e(asset('img/icons/icon-5.png')); ?>" alt="Разобраться с выгоранием и прокрастинацией">
                            </div>
                            <div class="pxp-services-1-item-title">Разобраться с выгоранием и прокрастинацией</div>
                            <div class="pxp-services-1-item-text pxp-text-light">Обрести смыслы и вернуть себя к жизни</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xl-3 pxp-services-1-item-container">
                        <div class="pxp-services-1-item text-center">
                            <div class="pxp-services-1-item-icon">
                                <img src="<?php echo e(asset('img/icons/icon-6.png')); ?>" alt="Справиться с ощущением безнадежности">
                            </div>
                            <div class="pxp-services-1-item-title">Справиться с ощущением безнадежности</div>
                            <div class="pxp-services-1-item-text pxp-text-light">Выбраться из замкнутого круга отчаяния и безысходности</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xl-3 pxp-services-1-item-container">
                        <div class="pxp-services-1-item text-center">
                            <div class="pxp-services-1-item-icon">
                                <img src="<?php echo e(asset('img/icons/icon-7.png')); ?>" alt="Сделать трудный выбор">
                            </div>
                            <div class="pxp-services-1-item-title">Преодолеть эмоциональную зависимость</div>
                            <div class="pxp-services-1-item-text pxp-text-light">Справиться с патологической привязанностью</div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="mt-4 mt-lg-5">
            <div class="pxp-container">
                <div class="row">

                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col pxp-companies-card-1-container">
                        <div class="pxp-companies-card-1 pxp-has-shadow">
                            <div class="pxp-companies-card-1-top">
                                <a href="/<?php echo e($category->path); ?>" class="pxp-companies-card-1-company-logo" style="background-image: url(<?php echo e(asset('public/storage/'. $category->image)); ?>);"></a>
                                <a href="/<?php echo e($category->path); ?>" class="pxp-companies-card-1-company-name"><?php echo e($category->name); ?></a>
                                <div class="pxp-companies-card-1-company-description pxp-text-light"><?php echo e($category->short_text); ?></div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                </div>
            </div>
        </section>

        <section class="mt-100">
            <div class="pxp-container">
                <div class="pxp-promo-img pxp-cover pt-100 pb-100 pxp-animate-in pxp-animate-in-top" style="background-image: url(<?php echo e(asset('img/cla.jpg')); ?>);">
                    <div class="row">
                        <div class="col-sm-7 col-lg-6">
                            <h2 class="pxp-section-h2 text-white"><?php echo e(__('site.any_questions')); ?></h2>
                            <p class="pxp-text-light text-white"><?php echo e(__('site.cta_text')); ?></p>
                            <div class="mt-4 mt-md-5">
                                <a href="/contact" class="btn rounded-pill pxp-section-cta"><?php echo e(__('site.ask_question')); ?><span class="fa fa-angle-right"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php echo $__env->make('site.sections.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('site.partials.modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('site.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\localhost\pavetra.loc\resources\views/site/pages/index.blade.php ENDPATH**/ ?>
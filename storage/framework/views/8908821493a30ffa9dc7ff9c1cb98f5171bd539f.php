<?php $__env->startSection('title', ''); ?>

<?php $__env->startSection('main'); ?>


    <?php echo $__env->make('site.sections.page-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section>
        <div class="pxp-container">
            <div class="pxp-blog-hero">
                <h1><?php echo e($page_data->name); ?></h1>
                <div class="pxp-hero-subtitle pxp-text-light"><?php echo e($page_data->short_text); ?></div>
            </div>

            <div>
                <div class="row">
                    <div class="col-lg-7 col-xl-8 col-xxl-9">
                        <div class="row">
                            <?php $__currentLoopData = $last_articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-6 col-lg-12 col-xl-6 col-xxl-4 pxp-posts-card-1-container">
                                <div class="pxp-posts-card-1 pxp-has-border">
                                    <div class="pxp-posts-card-1-top">
                                        <div class="pxp-posts-card-1-top-bg">
                                            <?php if(!empty($article->image)): ?>
                                            <div class="pxp-posts-card-1-image pxp-cover" style="background-image: url(<?php echo e(asset('public/storage/'. $article->image)); ?>);"></div>
                                            <?php endif; ?>
                                            <div class="pxp-posts-card-1-info">
                                                <div class="pxp-posts-card-1-date"><?php echo e($article->created_at); ?></div>
                                                <a href="/<?php echo e($article->category->path); ?>" class="pxp-posts-card-1-category"><?php echo e($article->category->name); ?></a>
                                            </div>
                                        </div>
                                        <div class="pxp-posts-card-1-content">
                                            <a href="/<?php echo e($article->path); ?>" class="pxp-posts-card-1-title"><?php echo e($article->name); ?></a>
                                            <div class="pxp-posts-card-1-summary pxp-text-light"><?php echo e($article->short_text); ?></div>
                                        </div>
                                    </div>
                                    <div class="pxp-posts-card-1-bottom">
                                        <div class="pxp-posts-card-1-cta">
                                            <a href="/<?php echo e($article->path); ?>">Подробнее<span class="fa fa-angle-right"></span></a>
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
                                <?php $__currentLoopData = $parent_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><a href="/<?php echo e($category->path); ?>"><?php echo e($category->name); ?></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>

                            <h3 class="mt-3 mt-lg-4">Популярные фразы</h3>
                            <div class="mt-2 mt-lg-3 pxp-blogs-side-tags">
                                <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="/<?php echo e($tag->path); ?>"><?php echo e($tag->short_text); ?></a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php echo $__env->make('site.sections.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('site.partials.modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('site.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\localhost\pavetra.loc\resources\views\site\pages\blog.blade.php ENDPATH**/ ?>
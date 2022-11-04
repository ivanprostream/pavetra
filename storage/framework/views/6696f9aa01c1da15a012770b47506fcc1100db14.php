<?php $__env->startSection('title', ''); ?>

<?php $__env->startSection('main'); ?>

    <?php echo $__env->make('site.sections.page-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section class="mt-100 pxp-no-hero">
        <div class="pxp-container">
            <h2 class="pxp-section-h2 text-center">В разработке</h2>
            <p class="pxp-text-light text-center">Мы трудимся день и ночь чтобы запустить самый полезный сервис для людей.</p>

            <div class="pxp-404-fig text-center mt-4 mt-lg-5">
                <img src="<?php echo e(asset('public/img/404.png')); ?>" alt="Page not found">
            </div>

            <div class="mt-4 mt-lg-5 text-center">
                <a href="<?php echo e(route('home')); ?>" class="btn rounded-pill pxp-section-cta"><?php echo e(__('site.go_home')); ?><span class="fa fa-angle-right"></span></a>
            </div>
        </div>
    </section>

    <?php echo $__env->make('site.sections.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('site.partials.modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('site.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\localhost\pavetra.loc\resources\views\site\catalog\search.blade.php ENDPATH**/ ?>
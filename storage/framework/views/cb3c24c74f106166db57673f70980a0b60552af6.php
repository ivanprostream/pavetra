<?php $__env->startSection('title', 'Pavetra | Coming Soon'); ?>

<?php $__env->startSection('main'); ?>

<section class="pxp-hero pxp-hero-bg pxp-cover" style="background-image: url(<?php echo e(asset('public/img/comingsoon.jpg')); ?>);">
    <div class="pxp-hero-opacity"></div>
    <div class="pxp-hero-caption">
        <div class="pxp-container">
            <div class="row justify-content-center">
                <div class="col-12 col-xl-9 col-xxl-8 text-center">
                    <img width="160" src="<?php echo e(asset('public/img/logo-white.png')); ?>" alt="Pavetra">
                    <h1 class="text-white mt-4">Покажите мне психически здорового человека, и я вам его вылечу</h1>
                    <div class="pxp-hero-subtitle text-white text-center mt-3 mt-lg-4"><h3>Карл Густав Юнг</h3></div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('site.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\localhost\pavetra.loc\resources\views\site\pages\comingsoon.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title', ''); ?>

<?php $__env->startSection('main'); ?>



    <?php if(empty($page_data->image)): ?>

    <?php echo $__env->make('site.sections.page-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section class="mb-100" style="background-color: var(--pxpMainColorTransparent);">
        <div class="pxp-container">
            <div class="pxp-blog-hero text-center">
                <h1><?php echo e($page_data->name); ?></h1>
            </div>
        </div>
    </section>
    <?php else: ?>

    <?php echo $__env->make('site.sections.home-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section class="pxp-page-image-hero pxp-cover" style="background-image: url(<?php echo e(asset('public/storage/'. $page_data->image)); ?>);">
        <div class="pxp-hero-opacity"></div>
        <div class="pxp-page-image-hero-caption">
            <div class="pxp-container">
                <div class="row justify-content-center">
                    <div class="col-9 col-md-8 col-xl-7 col-xxl-6">
                        <h1 class="text-center"><?php echo e($page_data->name); ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>




    <section class="mt-100">
        <div class="pxp-container">
            <div class="row justify-content-center">
                <div class="col-xl-9 col-xxl-9">
                    <p class="pxp-text-light text-center"><?php echo e($page_data->short_text); ?></p>

                    <div class="mt-4 mt-md-5">
                        <?php echo $page_data->content; ?>

                    </div>
                </div>
            </div>
        </div>
    </section>


    <?php echo $__env->make('site.sections.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('site.partials.modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('site.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\localhost\pavetra.loc\resources\views\site\pages\standart_page.blade.php ENDPATH**/ ?>
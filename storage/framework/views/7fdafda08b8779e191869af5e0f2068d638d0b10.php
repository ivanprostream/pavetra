<?php $__env->startSection('title', ''); ?>

<?php $__env->startSection('main'); ?>


    <?php echo $__env->make('site.sections.page-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section class="pxp-page-header-simple" style="background-color: var(--pxpSecondaryColor);">
        <div class="pxp-container">
            <h1><?php echo e($category_data->name); ?></h1>
            <div class="pxp-hero-subtitle pxp-text-light"><?php echo e($category_data->short_text); ?></div>
            <div class="pxp-hero-form pxp-hero-form-round pxp-large mt-3 mt-lg-4">
                <form class="row gx-3 align-items-center">
                    <div class="col-12 col-lg">
                        <div class="input-group mb-3 mb-lg-0">
                            <span class="input-group-text"><span class="fa fa-search"></span></span>
                            <input type="text" class="form-control" placeholder="Поиск по ключевым словам">
                        </div>
                    </div>
                    <div class="col-12 col-lg pxp-has-left-border">
                        <div class="input-group mb-3 mb-lg-0">
                            <span class="input-group-text"><span class="fa fa-folder-o"></span></span>
                            <select class="form-select">
                                <option selected>Выберите категорию</option>
                                <?php $__currentLoopData = $parent_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-lg-auto">
                        <button>Поиск</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <?php if(!empty($category_data->children)): ?>

    <section class="mt-100">
        <div class="pxp-container">
            <div class="row">
                <?php $__currentLoopData = $category_data->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-6 col-xl-4 col-xxl-3 pxp-companies-card-1-container">
                    <div class="pxp-companies-card-1 pxp-has-border">
                        <div class="pxp-companies-card-1-top">
                            <?php if(!empty($child->image)): ?>
                            <a href="/<?php echo e($child->path); ?>" class="pxp-companies-card-1-company-logo" style="background-image: url(<?php echo e(asset('public/storage/'. $child->image)); ?>);"></a>
                            <?php endif; ?>
                            <a href="/<?php echo e($child->path); ?>" class="pxp-companies-card-1-company-name"><?php echo e($child->name); ?></a>
                            <div class="pxp-companies-card-1-company-description pxp-text-light"><?php echo e($child->short_text); ?></div>
                        </div>
                        <div class="pxp-companies-card-1-bottom">
                            <a href="/<?php echo e($child->path); ?>" class="pxp-companies-card-1-company-jobs">Подробнее</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <section class="mt-100">
        <div class="pxp-container">
            <div class="row justify-content-center">
                <div class="col-xl-9 col-xxl-9">
                    <div class="mt-4 mt-md-5">
                        <?php echo $category_data->content; ?>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php echo $__env->make('site.sections.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('site.partials.modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('site.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\localhost\pavetra.loc\resources\views\site\pages\catalog.blade.php ENDPATH**/ ?>
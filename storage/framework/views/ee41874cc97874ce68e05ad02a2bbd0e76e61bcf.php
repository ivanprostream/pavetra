<footer class="pxp-main-footer mt-100">
    <div class="pxp-main-footer-top pt-100 pb-100" style="background-color:var(--pxpMainColorLight);">
        <div class="pxp-container">
            <div class="row">
                <div class="col-lg-6 col-xl-5 col-xxl-4 mb-4">
                    <div class="pxp-footer-logo">
                        <a href="/" class="pxp-animate"><img width="120" src="<?php echo e(asset('img/logo-blue.png')); ?>"></a>
                    </div>
                    <div class="pxp-footer-section mt-3 mt-md-4">
                        <div class="pxp-footer-phone">(123) 456-7890</div>
                    </div>
                    <div class="mt-3 mt-md-4 pxp-footer-section">
                        <div class="pxp-footer-text">
                            <?php echo __('site.cookie_text'); ?>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-7 col-xxl-8">
                    <div class="row">
                        <?php $__currentLoopData = $footer_menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-6 col-xl-4 col-xxl-3 mb-4">
                            <div class="pxp-footer-section">
                                <h3><?php echo e($item->name); ?></h3>
                                <ul class="pxp-footer-list">
                                    <?php $__currentLoopData = $item->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><a href="/<?php echo e($child->path); ?>"><?php echo e($child->name); ?></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pxp-main-footer-bottom" style="background-color: var(--pxpLightGrayColor);">
        <div class="pxp-container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-auto">
                    <div class="pxp-footer-copyright"><?php echo e(date('Y')); ?> Pavetra © <?php echo e(__('site.all_right_reserved')); ?></div>
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
<?php /**PATH C:\OpenServer\domains\localhost\pavetra.loc\resources\views/site/sections/footer.blade.php ENDPATH**/ ?>
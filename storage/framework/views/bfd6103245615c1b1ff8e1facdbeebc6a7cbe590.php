<?php $__env->startSection('title', $page_data->meta_title); ?>
<?php $__env->startSection('description', $page_data->meta_description); ?>
<?php $__env->startSection('keywords', $page_data->meta_keywords); ?>

<?php $__env->startSection('main'); ?>



<?php echo $__env->make('site.sections.page-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section class="mt-80 pxp-no-hero">
        <div class="pxp-container">
            <h2 class="pxp-section-h2 text-center"><?php echo e($page_data->name); ?></h2>

            <?php echo $__env->make('site.partials.flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="row mt-4 mt-md-5 justify-content-center pxp-animate-in pxp-animate-in-top">

                <?php $__currentLoopData = $contact_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-4 pxp-contact-card-1-container">
                    <a href="#" class="pxp-contact-card-1">
                        <div class="pxp-contact-card-1-icon-container">
                            <div class="pxp-contact-card-1-icon">
                                <span class="<?php echo e($item->const_info->icon); ?>"></span>
                            </div>
                        </div>
                        <div class="pxp-contact-card-1-title"><?php echo e($item->name); ?></div>
                    </a>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>

            <div class="row mt-100 justify-content-center pxp-animate-in pxp-animate-in-top">

                <div class="col-lg-6">
                    <div class="pxp-contact-us-form pxp-has-animation pxp-animate">
                        <h2 class="pxp-section-h2 text-center">Связаться с нами</h2>
                        <form class="mt-4" method="POST" action="<?php echo e(route('send_message')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="mb-3">
                                <label for="contact-us-name" class="form-label">Ваше имя</label>
                                <input type="text" class="form-control" id="contact-us-name" placeholder="Ваше имя" name="name" value="<?php echo e(old('name')); ?>">
                                <?php if($errors->has('name')): ?>
                                <div class="error">
                                    <?php echo e($errors->first('name')); ?>

                                </div>
                                <?php endif; ?>
                            </div>
                            <div class="mb-3">
                                <label for="contact-us-name" class="form-label">Телефон</label>
                                <input type="text" class="form-control" id="contact-us-name" placeholder="Ваше телефон" name="phone" value="<?php echo e(old('phone')); ?>">
                                <?php if($errors->has('phone')): ?>
                                <div class="error">
                                    <?php echo e($errors->first('phone')); ?>

                                </div>
                                <?php endif; ?>
                            </div>
                            <div class="mb-3">
                                <label for="contact-us-email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="contact-us-email" placeholder="Ваш e-mail" name="email" value="<?php echo e(old('email')); ?>">
                                <?php if($errors->has('email')): ?>
                                <div class="error">
                                    <?php echo e($errors->first('email')); ?>

                                </div>
                                <?php endif; ?>
                            </div>
                            <div class="mb-3">
                                <label for="contact-us-message" class="form-label">Сообщение</label>
                                <textarea class="form-control" id="contact-us-message" placeholder="Ваше сообщение" name="message"><?php echo e(old('message')); ?></textarea>
                                <input type="hidden" name="lang_id" value="1">
                                <input type="text" name="trap" value="" style="height: 0px; opacity:0;">
                                <?php if($errors->has('message')): ?>
                                <div class="error">
                                    <?php echo e($errors->first('message')); ?>

                                </div>
                                <?php endif; ?>
                            </div>
                            <div class="text-right">
                                <button  class="btn rounded-pill pxp-section-cta d-block">Отправить</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <div class="row mt-100 justify-content-center pxp-animate-in pxp-animate-in-top">
                <?php echo $page_data->content; ?>

            </div>
        </div>
    </section>

    <?php echo $__env->make('site.sections.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('site.partials.modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('site.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\localhost\pavetra.loc\resources\views/site/pages/contact_page.blade.php ENDPATH**/ ?>
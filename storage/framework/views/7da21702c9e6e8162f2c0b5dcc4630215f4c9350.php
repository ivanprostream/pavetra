<?php $__env->startSection('title', 'Edit country'); ?>

<?php $__env->startSection('main'); ?>

    <!-- Page header -->
    <div class="mb-8">
        <!-- Title -->
        <h1 class="text-2xl md:text-3xl text-gray-800 font-bold"><?php echo e(__('admin.edit')); ?>: <?php echo e($country_data->name); ?></h1>
        <?php echo $__env->make('admin.partials.flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    <div class="bg-white shadow-lg rounded-sm mb-8">
        <div class="flex flex-col md:flex-row md:-mr-px">



            <!-- Panel -->
            <div class="grow">
                <!-- Panel footer -->
                <footer>
                    <div class="px-6 py-8 border-t border-gray-200">
                        <form action="/admin/country_edit/<?php echo e($country_data->id); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <div class="sm:flex sm:items-center space-y-4 sm:space-y-0 sm:space-x-4 mt-5">
                                <div class="sm:w-1/4">
                                    <label class="block text-sm font-medium mb-1" for="user_name"><?php echo e(__('admin.country')); ?></label>
                                    <input id="name" class="form-input w-full" name="name" type="text" placeholder="<?php echo e(__('admin.country')); ?>" value="<?php echo e(old('name', $country_data->name)); ?>" />
                                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="sm:w-1/4">
                                    <label class="block text-sm font-medium mb-1" for="business-id"><?php echo e(__('admin.identifier')); ?></label>
                                    <input id="identifier" class="form-input w-full" name="url" type="text" placeholder="<?php echo e(__('admin.identifier')); ?>" value="<?php echo e(old('url', $country_data->url)); ?>" />
                                    <?php $__errorArgs = ['url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="sm:w-1/4">
                                    <button class="btn bg-indigo-500 hover:bg-indigo-600 text-white ml-2 mt-6"><?php echo e(__('admin.update')); ?></button>
                                </div>
                            </div>

                        </form>
                    </div>
                </footer>

            </div>

        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\localhost\pavetra.loc\resources\views\admin\country_edit.blade.php ENDPATH**/ ?>
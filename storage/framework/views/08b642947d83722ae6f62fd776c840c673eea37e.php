<?php $__env->startSection('title', 'Settings'); ?>

<?php $__env->startSection('main'); ?>

    <!-- Page header -->
    <div class="mb-8">
        <!-- Title -->
        <h1 class="text-2xl md:text-3xl text-gray-800 font-bold"><?php echo e(__('admin.account_settings')); ?></h1>
        <?php echo $__env->make('admin.partials.flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    <div class="bg-white shadow-lg rounded-sm mb-8">
        <div class="flex flex-col md:flex-row md:-mr-px">

            <!-- Sidebar -->
            <div class="flex flex-nowrap overflow-x-scroll no-scrollbar md:block md:overflow-auto px-3 py-6 border-b md:border-b-0 md:border-r border-gray-200 min-w-60 md:space-y-3">
                <!-- Group 1 -->
                <div>
                    <div class="text-xs font-semibold text-gray-400 uppercase mb-3"><?php echo e(__('admin.settings')); ?></div>
                    <ul class="flex flex-nowrap md:block mr-3 md:mr-0">
                        <li class="mr-0.5 md:mr-0 md:mb-0.5">
                            <a class="flex items-center px-2.5 py-2 rounded whitespace-nowrap" :class="settingsPanel === 'account' && 'bg-indigo-50'" href="<?php echo e(route('settings')); ?>">
                                <svg class="w-4 h-4 shrink-0 fill-current text-gray-400 mr-2" :class="settingsPanel === 'account' && 'text-indigo-400'" viewBox="0 0 16 16">
                                    <path d="M12.311 9.527c-1.161-.393-1.85-.825-2.143-1.175A3.991 3.991 0 0012 5V4c0-2.206-1.794-4-4-4S4 1.794 4 4v1c0 1.406.732 2.639 1.832 3.352-.292.35-.981.782-2.142 1.175A3.942 3.942 0 001 13.26V16h14v-2.74c0-1.69-1.081-3.19-2.689-3.733zM6 4c0-1.103.897-2 2-2s2 .897 2 2v1c0 1.103-.897 2-2 2s-2-.897-2-2V4zm7 10H3v-.74c0-.831.534-1.569 1.33-1.838 1.845-.624 3-1.436 3.452-2.422h.436c.452.986 1.607 1.798 3.453 2.422A1.943 1.943 0 0113 13.26V14z" />
                                </svg>
                                <span class="text-sm font-medium text-gray-600" :class="settingsPanel === 'account' ? 'text-indigo-500' : 'hover:text-gray-700'"><?php echo e(__('admin.my_account')); ?></span>
                            </a>
                        </li>
                        <li class="mr-0.5 md:mr-0 md:mb-0.5">
                            <a class="flex items-center px-2.5 py-2 rounded whitespace-nowrap bg-indigo-50" href="/admin/change_password">
                                <svg class="w-4 h-4 shrink-0 fill-current mr-2 text-indigo-400" viewBox="0 0 16 16">
                                    <path d="M14.3.3c.4-.4 1-.4 1.4 0 .4.4.4 1 0 1.4l-8 8c-.2.2-.4.3-.7.3-.3 0-.5-.1-.7-.3-.4-.4-.4-1 0-1.4l8-8zM15 7c.6 0 1 .4 1 1 0 4.4-3.6 8-8 8s-8-3.6-8-8 3.6-8 8-8c.6 0 1 .4 1 1s-.4 1-1 1C4.7 2 2 4.7 2 8s2.7 6 6 6 6-2.7 6-6c0-.6.4-1 1-1z" />
                                </svg>
                                <span class="text-sm font-medium text-indigo-500"><?php echo e(__('admin.change_password')); ?></span>
                            </a>
                        </li>

                    </ul>
                </div>

            </div>

            <!-- Panel -->
            <div class="grow">
                <form action="/admin/change_password/<?php echo e($user->id); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <!-- Panel body -->
                    <div class="p-6 space-y-6">
                        <h2 class="text-2xl text-gray-800 font-bold mb-5"><?php echo e(__('admin.my_account')); ?></h2>

                            <!-- Business Profile -->
                            <section>


                                <div class="sm:flex sm:items-center space-y-4 sm:space-y-0 sm:space-x-4 mt-5">
                                    <div class="sm:w-1/3">
                                        <input id="password" class="form-input w-full" name="password" type="password" placeholder="<?php echo e(__('admin.change_password_text')); ?>" value="" />
                                        <?php $__errorArgs = ['password'];
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
                                    <div class="sm:w-1/3">
                                        <input id="password_confirmation" class="form-input w-full" name="password_confirmation" type="password" placeholder="<?php echo e(__('admin.repeat_password_text')); ?>" value="" />
                                        <?php $__errorArgs = ['password_confirmation'];
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
                                    <div class="sm:w-1/3">
                                        <button class="btn bg-indigo-500 hover:bg-indigo-600 text-white ml-3"><?php echo e(__('admin.save_changes')); ?></button>
                                    </div>
                                </div>
                            </section>



                    </div>

                </form>

            </div>

        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\localhost\pavetra.loc\resources\views/admin/change_password.blade.php ENDPATH**/ ?>
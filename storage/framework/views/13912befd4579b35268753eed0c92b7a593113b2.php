<?php $__env->startSection('title', 'User List'); ?>

<?php $__env->startSection('main'); ?>

<div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

    <!-- Page header -->
    <div class="sm:flex sm:justify-between sm:items-center mb-8">

        <!-- Left: Title -->
        <div class="mb-4 sm:mb-0">
            <h1 class="text-2xl md:text-3xl text-gray-800 font-bold"><?php echo e(__('admin.users')); ?></h1>
        </div>

        <!-- Right: Actions -->
        <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">

            <!-- Add member button -->
            <a href="/admin/user_create" class="btn bg-indigo-500 hover:bg-indigo-600 text-white">
                <svg class="w-4 h-4 fill-current opacity-50 shrink-0" viewBox="0 0 16 16">
                    <path d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z" />
                </svg>
                <span class="hidden xs:block ml-2"><?php echo e(__('admin.add')); ?></span>
            </a>

        </div>


    </div>

    <?php echo $__env->make('admin.partials.flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <br>
    <!-- Cards -->
    <div class="grid grid-cols-12 gap-6">

        <!-- Team cards -->

        <!-- Card 1 -->
        <?php $__currentLoopData = $user_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-span-full sm:col-span-6 xl:col-span-3 bg-white shadow-lg rounded-sm border border-gray-200">
            <div class="flex flex-col h-full">
                <!-- Card top -->
                <div class="grow p-5">
                    <header>
                        <div class="text-center">
                            <a class="inline-flex text-gray-800 hover:text-gray-900" href="#0">
                                <h2 class="text-xl leading-snug justify-center font-semibold"><?php echo e($item->name); ?></h2>
                            </a>
                        </div>
                        <div class="flex justify-center items-center"><span class="text-sm font-medium text-gray-400 -mt-0.5 mr-1">-&gt;</span> <span><?php echo e($item->roles->first()->name); ?></span></div>
                    </header>
                    <!-- Bio -->
                    <div class="text-center mt-2">
                        <div class="text-sm">
                            <ul>
                                <li><strong><?php echo e(__('admin.phone')); ?>:</strong> <?php echo e($item->phone); ?></li>
                                <li><strong><?php echo e(__('admin.email_adress')); ?>:</strong> <?php echo e($item->email); ?></li>
                                <li><strong><?php echo e(__('admin.country')); ?>:</strong> <?php echo e($item->country_info->name); ?></li>
                                <li><strong><?php echo e(__('admin.lang')); ?>:</strong> <?php echo e($item->lang_info->name); ?></li>
                                <li><strong><?php echo e(__('admin.gender')); ?>:</strong> <?php echo $__env->make('admin.partials.gender-show', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Card footer -->
                <div class="border-t border-gray-200">
                    <div class="flex divide-x divide-gray-200r">

                        <a class="block flex-1 text-center text-sm text-gray-600 hover:text-gray-800 font-medium px-3 py-4 group" href="/admin/user_edit/<?php echo e($item->id); ?>">
                            <div class="flex items-center justify-center">
                                <svg class="w-4 h-4 fill-current text-gray-400 group-hover:text-gray-500 shrink-0 mr-2" viewBox="0 0 16 16">
                                    <path d="M11.7.3c-.4-.4-1-.4-1.4 0l-10 10c-.2.2-.3.4-.3.7v4c0 .6.4 1 1 1h4c.3 0 .5-.1.7-.3l10-10c.4-.4.4-1 0-1.4l-4-4zM4.6 14H2v-2.6l6-6L10.6 8l-6 6zM12 6.6L9.4 4 11 2.4 13.6 5 12 6.6z" />
                                </svg>
                                <span><?php echo e(__('admin.edit')); ?></span>
                            </div>
                        </a>

                        <form method="POST" action="/admin/user_delete/<?php echo e($item->id); ?>">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button class="block flex-1 text-center text-sm text-gray-600 hover:text-gray-800 font-medium px-3 py-4">
                                <div class="flex items-center justify-center">
                                    <svg class="w-4 h-4 fill-current text-gray-400 group-hover:text-gray-500 shrink-0 mr-2" viewBox="0 0 16 16">
                                        <path d="M5 7h2v6H5V7zm4 0h2v6H9V7zm3-6v2h4v2h-1v10c0 .6-.4 1-1 1H2c-.6 0-1-.4-1-1V5H0V3h4V1c0-.6.4-1 1-1h6c.6 0 1 .4 1 1zM6 2v1h4V2H6zm7 3H3v9h10V5z" />
                                    </svg>
                                    <span onclick="return confirm(<?php echo e(__('admin.sure')); ?>)"><?php echo e(__('admin.delete')); ?></span>
                                </div>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>


</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\localhost\pavetra.loc\resources\views/admin/users/index.blade.php ENDPATH**/ ?>
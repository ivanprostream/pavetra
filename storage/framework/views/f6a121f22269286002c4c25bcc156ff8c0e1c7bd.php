<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf_token" content="<?php echo e(csrf_token()); ?>" />
    <title><?php echo $__env->yieldContent('title'); ?> :: Pavetra</title>
    <link rel="shortcut icon" href="<?php echo e(asset('public/img/favicon.png')); ?>" type="image/x-icon">
    <link href="<?php echo e(asset('public/admin/css/style.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('public/admin/css/summernote-lite.min.css')); ?>" rel="stylesheet">
</head>

<body
    class="font-inter antialiased bg-gray-100 text-gray-600"
    :class="{ 'sidebar-expanded': sidebarExpanded }"
    x-data="{ page: 'dashboard', sidebarOpen: false, sidebarExpanded: localStorage.getItem('sidebar-expanded') == 'true' }"
    x-init="$watch('sidebarExpanded', value => localStorage.setItem('sidebar-expanded', value))"
>

    <!-- Page wrapper -->
    <div class="flex h-screen overflow-hidden">

        <!-- Sidebar -->
        <?php echo $__env->make('admin.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- Content area -->
        <div class="relative flex flex-col flex-1 overflow-y-auto overflow-x-hidden">

            <!-- Site header -->
            <?php echo $__env->make('admin.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <main>
                <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
                        <?php echo $__env->yieldContent('main'); ?>
                    </div>

                </div>
            </main>

        </div>

    </div>

    <script src="<?php echo e(asset('public/admin/js/main.js')); ?>"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="<?php echo e(asset('public/admin/js/summernote-lite.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/admin/js/jquery-ui.min.js')); ?>"></script>

    <script src="<?php echo e(asset('public/admin/js/custom.js')); ?>"></script>
</body>

</html>
<?php /**PATH C:\OpenServer\domains\localhost\pavetra.loc\resources\views/admin/layouts/app.blade.php ENDPATH**/ ?>
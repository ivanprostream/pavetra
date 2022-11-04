<!doctype html>
<html lang="en" class="pxp-root">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="shortcut icon" href="<?php echo e(asset('public/img/favicon.png')); ?>" type="image/x-icon">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;400;500;600&display=swap" rel="stylesheet">
        <link href="<?php echo e(asset('public/site/css/bootstrap.min.css')); ?>" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo e(asset('public/site/css/font-awesome.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('public/site/css/owl.carousel.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('public/site/css/owl.theme.default.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('public/site/css/animate.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('public/site/css/style.css')); ?>">

        <title><?php echo $__env->yieldContent('title'); ?></title>
    </head>
    <body>

        <?php echo $__env->make('site.partials.preloader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->yieldContent('main'); ?>

        <script src="<?php echo e(asset('public/site/js/jquery-3.4.1.min.js')); ?>"></script>
        <script src="<?php echo e(asset('public/site/js/bootstrap.bundle.min.js')); ?>"></script>
        <script src="<?php echo e(asset('public/site/js/owl.carousel.min.js')); ?>"></script>
        <script src="<?php echo e(asset('public/site/js/nav.js')); ?>"></script>
        <script src="<?php echo e(asset('public/site/js/main.js')); ?>"></script>
    </body>
</html>
<?php /**PATH C:\OpenServer\domains\localhost\pavetra.loc\resources\views/site/layouts/app.blade.php ENDPATH**/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?php echo $__env->yieldContent('title'); ?> :: Pavetra</title>
    <link rel="shortcut icon" href="<?php echo e(asset('img/favicon.png')); ?>" type="image/x-icon">
    <link href="<?php echo e(asset('admin/css/style.css')); ?>" rel="stylesheet">
</head>

<body
    class="font-inter antialiased bg-gray-100 text-gray-600"
    :class="{ 'sidebar-expanded': sidebarExpanded }"
    x-data="{ page: 'dashboard', sidebarOpen: false, sidebarExpanded: localStorage.getItem('sidebar-expanded') == 'true' }"
    x-init="$watch('sidebarExpanded', value => localStorage.setItem('sidebar-expanded', value))"
>

<main class="bg-white">

    <div class="relative flex">

        <!-- Content -->
        <div class="w-full md:w-1/2">

            <div class="min-h-screen h-full flex flex-col after:flex-1">

                <!-- Header -->
                <div class="flex-1">
                    <div class="flex items-center justify-between h-16 px-4 sm:px-6 lg:px-8">
                        <!-- Logo -->
                        <a class="block" href="/">
                            <img width="120" src="<?php echo e(asset('img/logo-blue.png')); ?>" alt="Pavetra logo">
                        </a>
                    </div>
                </div>

                <div class="max-w-sm mx-auto px-4 py-8">

                    <h1 class="text-3xl text-gray-800 font-bold mb-6"><?php echo e(__('admin.reset_password')); ?></h1>
                    <div class="mb-4 text-sm text-gray-600">
                        <?php echo e(__('admin.forgot_password_text')); ?>

                    </div>
                    <!-- Form -->
                    <form method="POST" action="<?php echo e(route('password.email')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium mb-1" for="email"><?php echo e(__('admin.email_adress')); ?> <span class="text-red-500">*</span></label>
                                <input id="email" class="form-input w-full" type="email" name="email" value="<?php echo e(old('email')); ?>" required autofocus />
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('email'),'class' => 'mt-2']] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('email')),'class' => 'mt-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            </div>
                        </div>
                        <div class="flex items-center justify-between mt-6">
                            <button class="btn bg-indigo-500 hover:bg-indigo-600 text-white"><?php echo e(__('admin.email_password_reset_link')); ?></button>
                        </div>
                    </form>
                    <!-- Footer -->

                </div>

            </div>

        </div>

        <!-- Image -->
        <div class="hidden md:block absolute top-0 bottom-0 right-0 md:w-1/2" aria-hidden="true">
            <img class="object-cover object-center w-full h-full" src="<?php echo e(asset('img/auth-image.jpg')); ?>" width="760" height="1024" alt="<?php echo e(__('admin.authentication')); ?>" />
        </div>

    </div>

</main>


<script src="<?php echo e(asset('admin/js/main.js')); ?>"></script>
</body>

</html>
<?php /**PATH C:\OpenServer\domains\localhost\pavetra.loc\resources\views\auth\forgot-password.blade.php ENDPATH**/ ?>
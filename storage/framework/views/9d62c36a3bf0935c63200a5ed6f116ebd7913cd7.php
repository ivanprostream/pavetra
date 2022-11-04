<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?php echo $__env->yieldContent('title'); ?> :: Pavetra</title>
    <link rel="shortcut icon" href="<?php echo e(asset('public/img/favicon.png')); ?>" type="image/x-icon">
    <link href="<?php echo e(asset('public/admin/css/style.css')); ?>" rel="stylesheet">
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

                    <h1 class="text-3xl text-gray-800 font-bold mb-6"><?php echo e(__('admin.dashboard')); ?></h1>
                    <!-- Form -->
                    <form method="POST" action="<?php echo e(route('login')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium mb-1" for="email"><?php echo e(__('admin.email_adress')); ?></label>
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
                            <div>
                                <label class="block text-sm font-medium mb-1" for="password"><?php echo e(__('admin.password')); ?></label>
                                <input id="password" class="form-input w-full" type="password" name="password" required autocomplete="current-password" />
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('password'),'class' => 'mt-2']] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('password')),'class' => 'mt-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            </div>
                        </div>
                        <div class="flex items-center justify-between mt-6">
                            <div class="mr-1">
                                <a class="text-sm underline hover:no-underline" href="<?php echo e(route('password.request')); ?>"><?php echo e(__('admin.forgot_password')); ?></a>
                            </div>
                            <button class="btn bg-indigo-500 hover:bg-indigo-600 text-white ml-3"><?php echo e(__('admin.log_in')); ?></button>
                        </div>
                    </form>
                    <!-- Footer -->
                    <div class="pt-5 mt-6 border-t border-gray-200">
                        <div class="text-sm">
                            <?php echo e(__('admin.dont_have_an_account')); ?> <a class="font-medium text-indigo-500 hover:text-indigo-600" href="<?php echo e(route('register')); ?>"><?php echo e(__('admin.sign_up')); ?></a>
                        </div>
                        <!-- Warning -->
                        
                    </div>

                </div>

            </div>

        </div>

        <!-- Image -->
        <div class="hidden md:block absolute top-0 bottom-0 right-0 md:w-1/2" aria-hidden="true">
            <img class="object-cover object-center w-full h-full" src="<?php echo e(asset('img/auth-image.jpg')); ?>" width="760" height="1024" alt="<?php echo e(__('admin.authentication')); ?>" />
        </div>

    </div>

</main>


<script src="<?php echo e(asset('public/admin/js/main.js')); ?>"></script>
</body>

</html>


<?php /**PATH C:\OpenServer\domains\localhost\pavetra.loc\resources\views\auth\login.blade.php ENDPATH**/ ?>
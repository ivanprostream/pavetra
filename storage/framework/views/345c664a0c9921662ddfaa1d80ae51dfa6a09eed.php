<header class="pxp-header pxp-no-bg pxp-has-border">
    <div class="pxp-container">
        <div class="pxp-header-container">
            <div class="pxp-logo">
                <a href="/" class="pxp-animate"><img width="140" src="<?php echo e(asset('public/img/logo-blue.png')); ?>"></a>
            </div>
            <div class="pxp-nav-trigger navbar d-xl-none flex-fill">
                <a role="button" data-bs-toggle="offcanvas" data-bs-target="#pxpMobileNav" aria-controls="pxpMobileNav">
                    <div class="pxp-line-1"></div>
                    <div class="pxp-line-2"></div>
                    <div class="pxp-line-3"></div>
                </a>
                <div class="offcanvas offcanvas-start pxp-nav-mobile-container" tabindex="-1" id="pxpMobileNav">
                    <div class="offcanvas-header">
                        <div class="pxp-logo">
                            <a href="/" class="pxp-animate"><img width="140" src="<?php echo e(asset('public/img/logo-white.png')); ?>"></a>
                        </div>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <nav class="pxp-nav-mobile">
                            <ul class="navbar-nav justify-content-end flex-grow-1">

                                <?php $__currentLoopData = $header_menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($item->parent == NULL): ?>
                                    <li class="nav-item"><a href="<?php echo e($item->path); ?>"><?php echo e($item->name); ?></a></li>
                                <?php else: ?>
                                    <li class="nav-item dropdown">
                                        <a role="button" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">О проекте</a>
                                        <ul class="dropdown-menu">
                                            <?php $__currentLoopData = $item->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li class="nav-item"><a href="/<?php echo e($child->path); ?>"><?php echo e($child->name); ?></a></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </li>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <nav class="pxp-nav dropdown-hover-all d-none d-xl-block mt-2">
                <ul>
                    <?php $__currentLoopData = $header_menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(count($item->children) == 0): ?>
                        <li><a href="<?php echo e($item->path); ?>"><?php echo e($item->name); ?></a></li>
                    <?php else: ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown"><?php echo e($item->name); ?></a>
                            <ul class="dropdown-menu">
                                <?php $__currentLoopData = $item->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><a class="dropdown-item" href="/<?php echo e($child->path); ?>"><?php echo e($child->name); ?></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </li>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </ul>
            </nav>
            <nav class="pxp-user-nav d-none d-sm-flex mt-2">
                <a class="btn rounded-pill pxp-nav-btn" href="<?php echo e(route('search')); ?>">Подобрать психолога</a>
                
            </nav>
        </div>
    </div>
</header>
<?php /**PATH C:\OpenServer\domains\localhost\pavetra.loc\resources\views/site/sections/page-header.blade.php ENDPATH**/ ?>
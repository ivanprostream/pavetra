<div>
    <!-- Sidebar backdrop (mobile only) -->
    <div
        class="fixed inset-0 bg-gray-900 bg-opacity-30 z-40 lg:hidden lg:z-auto transition-opacity duration-200"
        :class="sidebarOpen ? 'opacity-100' : 'opacity-0 pointer-events-none'"
        aria-hidden="true"
        x-cloak
    ></div>

    <!-- Sidebar -->
    <div
        id="sidebar"
        class="flex flex-col absolute z-40 left-0 top-0 lg:static lg:left-auto lg:top-auto lg:translate-x-0 transform h-screen overflow-y-scroll lg:overflow-y-auto no-scrollbar w-64 lg:w-20 lg:sidebar-expanded:!w-64 2xl:!w-64 shrink-0 bg-gray-800 p-4 transition-all duration-200 ease-in-out"
        :class="sidebarOpen ? 'translate-x-0' : '-translate-x-64'"
        @click.outside="sidebarOpen = false"
        @keydown.escape.window="sidebarOpen = false"
        x-cloak="lg"
    >

        <!-- Sidebar header -->
        <div class="flex justify-between mb-10 pr-3 sm:px-2">
            <!-- Close button -->
            <button class="lg:hidden text-gray-500 hover:text-gray-400" @click.stop="sidebarOpen = !sidebarOpen" aria-controls="sidebar" :aria-expanded="sidebarOpen">
                <span class="sr-only">Close sidebar</span>
                <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.7 18.7l1.4-1.4L7.8 13H20v-2H7.8l4.3-4.3-1.4-1.4L4 12z" />
                </svg>
            </button>
            <!-- Logo -->
            <a class="block" href="<?php echo e(route('dashboard')); ?>">
                <img width="100" src="<?php echo e(asset('img/logo-white.png')); ?>" alt="Pavetra logo">
            </a>
        </div>

        <!-- Links -->
        <div class="space-y-8">
            <!-- Pages group -->
            <div>
                <h3 class="text-xs uppercase text-gray-500 font-semibold pl-3">
                    <span class="hidden lg:block lg:sidebar-expanded:hidden 2xl:hidden text-center w-6" aria-hidden="true">•••</span>
                    <span class="lg:hidden lg:sidebar-expanded:block 2xl:block"><?php echo e(__('admin.administration')); ?></span>
                </h3>
                <ul class="mt-3">
                    <!-- Dashboard -->
                    <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 <?php if(isset($sidebar) && $sidebar == 'dashboard'): ?> bg-gray-900 <?php endif; ?>">
                        <a class="block text-gray-200 hover:text-white truncate transition duration-150" href="<?php echo e(route('dashboard')); ?>">
                            <div class="flex items-center">
                                <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                    <path class="fill-current <?php if(isset($sidebar) && $sidebar == 'dashboard'): ?> !text-indigo-500 <?php else: ?> text-gray-400 <?php endif; ?>" d="M12 0C5.383 0 0 5.383 0 12s5.383 12 12 12 12-5.383 12-12S18.617 0 12 0z" />
                                    <path class="fill-current text-gray-600 <?php if(isset($sidebar) && $sidebar == 'dashboard'): ?> text-indigo-600 <?php endif; ?>" d="M12 3c-4.963 0-9 4.037-9 9s4.037 9 9 9 9-4.037 9-9-4.037-9-9-9z" />
                                    <path class="fill-current text-gray-400 <?php if(isset($sidebar) && $sidebar == 'dashboard'): ?> text-indigo-200 <?php endif; ?>" d="M12 15c-1.654 0-3-1.346-3-3 0-.462.113-.894.3-1.285L6 6l4.714 3.301A2.973 2.973 0 0112 9c1.654 0 3 1.346 3 3s-1.346 3-3 3z" />
                                </svg>
                                <span class="text-sm ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200"><?php echo e(__('admin.dashboard')); ?></span>
                            </div>
                        </a>
                    </li>
                    <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 <?php if(isset($sidebar) && $sidebar == 'users'): ?> bg-gray-900 <?php endif; ?>">
                        <a class="block text-gray-200 hover:text-white truncate transition duration-150" href="<?php echo e(route('users')); ?>">
                            <div class="flex items-center">
                                <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                    <path class="fill-current text-gray-600 <?php if(isset($sidebar) && $sidebar == 'users'): ?> !text-indigo-600 <?php endif; ?>" d="M18.974 8H22a2 2 0 012 2v6h-2v5a1 1 0 01-1 1h-2a1 1 0 01-1-1v-5h-2v-6a2 2 0 012-2h.974zM20 7a2 2 0 11-.001-3.999A2 2 0 0120 7zM2.974 8H6a2 2 0 012 2v6H6v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5H0v-6a2 2 0 012-2h.974zM4 7a2 2 0 11-.001-3.999A2 2 0 014 7z" />
                                    <path class="fill-current text-gray-400 <?php if(isset($sidebar) && $sidebar == 'users'): ?> !text-indigo-500 <?php endif; ?>" d="M12 6a3 3 0 110-6 3 3 0 010 6zm2 18h-4a1 1 0 01-1-1v-6H6v-6a3 3 0 013-3h6a3 3 0 013 3v6h-3v6a1 1 0 01-1 1z" />
                                </svg>
                                <span class="text-sm ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200"><?php echo e(__('admin.users')); ?></span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- Pages group -->
            <div>
                <h3 class="text-xs uppercase text-gray-500 font-semibold pl-3">
                    <span class="hidden lg:block lg:sidebar-expanded:hidden 2xl:hidden text-center w-6" aria-hidden="true">•••</span>
                    <span class="lg:hidden lg:sidebar-expanded:block 2xl:block"><?php echo e(__('admin.content')); ?></span>
                </h3>
                <ul class="mt-3">
                    <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0  <?php if(isset($sidebar) && $sidebar == 'pages'): ?> bg-gray-900 <?php endif; ?>">
                        <a class="block text-gray-200 hover:text-white truncate transition duration-150" href="<?php echo e(route('pages')); ?>">
                            <div class="flex items-center">
                                <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                    <path class="fill-current text-gray-600 <?php if(isset($sidebar) && $sidebar == 'pages'): ?> !text-indigo-600 <?php endif; ?>" d="M20 7a.75.75 0 01-.75-.75 1.5 1.5 0 00-1.5-1.5.75.75 0 110-1.5 1.5 1.5 0 001.5-1.5.75.75 0 111.5 0 1.5 1.5 0 001.5 1.5.75.75 0 110 1.5 1.5 1.5 0 00-1.5 1.5A.75.75 0 0120 7zM4 23a.75.75 0 01-.75-.75 1.5 1.5 0 00-1.5-1.5.75.75 0 110-1.5 1.5 1.5 0 001.5-1.5.75.75 0 111.5 0 1.5 1.5 0 001.5 1.5.75.75 0 110 1.5 1.5 1.5 0 00-1.5 1.5A.75.75 0 014 23z" />
                                    <path class="fill-current text-gray-400 <?php if(isset($sidebar) && $sidebar == 'pages'): ?> !text-indigo-500 <?php endif; ?>" d="M17 23a1 1 0 01-1-1 4 4 0 00-4-4 1 1 0 010-2 4 4 0 004-4 1 1 0 012 0 4 4 0 004 4 1 1 0 010 2 4 4 0 00-4 4 1 1 0 01-1 1zM7 13a1 1 0 01-1-1 4 4 0 00-4-4 1 1 0 110-2 4 4 0 004-4 1 1 0 112 0 4 4 0 004 4 1 1 0 010 2 4 4 0 00-4 4 1 1 0 01-1 1z" />
                                </svg>
                                <span class="text-sm ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200"><?php echo e(__('admin.pages')); ?></span>
                            </div>
                        </a>
                    </li>
                    <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 <?php if(isset($sidebar) && $sidebar == 'blog'): ?> bg-gray-900 <?php endif; ?>">
                        <a class="block text-gray-200 hover:text-white truncate transition duration-150" href="/admin/blog">
                            <div class="flex items-center">
                                <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                    <circle class="fill-current text-gray-600 <?php if(isset($sidebar) && $sidebar == 'blog'): ?> !text-indigo-500 <?php endif; ?>" :class="page.startsWith('component-') && 'text-indigo-500'" cx="16" cy="8" r="8" />
                                    <circle class="fill-current text-gray-400 <?php if(isset($sidebar) && $sidebar == 'blog'): ?> !text-indigo-300 <?php endif; ?>" :class="page.startsWith('component-') && 'text-indigo-300'" cx="8" cy="16" r="8" />
                                </svg>
                                <span class="text-sm ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200"><?php echo e(__('admin.articles')); ?></span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- Pages group -->
            <div>
                <h3 class="text-xs uppercase text-gray-500 font-semibold pl-3">
                    <span class="hidden lg:block lg:sidebar-expanded:hidden 2xl:hidden text-center w-6" aria-hidden="true">•••</span>
                    <span class="lg:hidden lg:sidebar-expanded:block 2xl:block"><?php echo e(__('admin.catalog')); ?></span>
                </h3>
                <ul class="mt-3">
                    <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0" x-data="{ open: false }">
                        <a class="sidebar-expander-link block text-gray-200 hover:text-white transition duration-150" :class="open && 'hover:text-gray-200'" href="#0" @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                        <path class="fill-current text-gray-600" d="M19 5h1v14h-2V7.414L5.707 19.707 5 19H4V5h2v11.586L18.293 4.293 19 5Z" />
                                        <path class="fill-current text-gray-400" d="M5 9a4 4 0 1 1 0-8 4 4 0 0 1 0 8Zm14 0a4 4 0 1 1 0-8 4 4 0 0 1 0 8ZM5 23a4 4 0 1 1 0-8 4 4 0 0 1 0 8Zm14 0a4 4 0 1 1 0-8 4 4 0 0 1 0 8Z" />
                                    </svg>
                                    <span class="text-sm ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200"><?php echo e(__('admin.categories')); ?></span>
                                </div>
                                <!-- Icon -->
                                <div class="flex shrink-0 ml-2 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                    <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-gray-400" :class="{ 'transform rotate-180': open }" viewBox="0 0 12 12">
                                        <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                                    </svg>
                                </div>
                            </div>
                        </a>
                        <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                            <ul class="pl-9 mt-1" :class="{ 'hidden': !open }" x-cloak>
                                <li class="mb-1 last:mb-0">
                                    <a class="block text-gray-400 hover:text-gray-200 transition duration-150 truncate" href="/admin/categories">
                                        <span class="text-sm lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200"><?php echo e(__('admin.categories')); ?></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0">
                        <a class="block text-gray-200 hover:text-white truncate transition duration-150" href="">
                            <div class="flex items-center">
                                <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                    <path class="fill-current text-gray-600" :class="page.startsWith('settings-') && 'text-indigo-500'" d="M19.714 14.7l-7.007 7.007-1.414-1.414 7.007-7.007c-.195-.4-.298-.84-.3-1.286a3 3 0 113 3 2.969 2.969 0 01-1.286-.3z" />
                                    <path class="fill-current text-gray-400" :class="page.startsWith('settings-') && 'text-indigo-300'" d="M10.714 18.3c.4-.195.84-.298 1.286-.3a3 3 0 11-3 3c.002-.446.105-.885.3-1.286l-6.007-6.007 1.414-1.414 6.007 6.007z" />
                                    <path class="fill-current text-gray-600" :class="page.startsWith('settings-') && 'text-indigo-500'" d="M5.7 10.714c.195.4.298.84.3 1.286a3 3 0 11-3-3c.446.002.885.105 1.286.3l7.007-7.007 1.414 1.414L5.7 10.714z" />
                                    <path class="fill-current text-gray-400" :class="page.startsWith('settings-') && 'text-indigo-300'" d="M19.707 9.292a3.012 3.012 0 00-1.415 1.415L13.286 5.7c-.4.195-.84.298-1.286.3a3 3 0 113-3 2.969 2.969 0 01-.3 1.286l5.007 5.006z" />
                                </svg>
                                <span class="text-sm ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200"><?php echo e(__('admin.psychologists')); ?></span>
                            </div>
                        </a>
                    </li>
                    <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0">
                        <a class="block text-gray-200 hover:text-white truncate transition duration-150" href="">
                            <div class="flex items-center">
                                <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                    <path class="fill-current text-gray-600" :class="page === 'analytics' && 'text-indigo-500'" d="M0 20h24v2H0z" />
                                    <path class="fill-current text-gray-400" :class="page === 'analytics' && 'text-indigo-300'" d="M4 18h2a1 1 0 001-1V8a1 1 0 00-1-1H4a1 1 0 00-1 1v9a1 1 0 001 1zM11 18h2a1 1 0 001-1V3a1 1 0 00-1-1h-2a1 1 0 00-1 1v14a1 1 0 001 1zM17 12v5a1 1 0 001 1h2a1 1 0 001-1v-5a1 1 0 00-1-1h-2a1 1 0 00-1 1z" />
                                </svg>
                                <span class="text-sm ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200"><?php echo e(__('admin.analytics')); ?></span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>

        </div>

        <!-- Expand / collapse button -->
        <div class="pt-3 hidden lg:inline-flex 2xl:hidden justify-end mt-auto">
            <div class="px-3 py-2">
                <button @click="sidebarExpanded = !sidebarExpanded">
                    <span class="sr-only">Expand / collapse sidebar</span>
                    <svg class="w-6 h-6 fill-current sidebar-expanded:rotate-180" viewBox="0 0 24 24">
                        <path class="text-gray-400" d="M19.586 11l-5-5L16 4.586 23.414 12 16 19.414 14.586 18l5-5H7v-2z" />
                        <path class="text-gray-600" d="M3 23H1V1h2z" />
                    </svg>
                </button>
            </div>
        </div>

    </div>
</div>
<?php /**PATH C:\OpenServer\domains\localhost\pavetra.loc\resources\views/admin/layouts/sidebar.blade.php ENDPATH**/ ?>
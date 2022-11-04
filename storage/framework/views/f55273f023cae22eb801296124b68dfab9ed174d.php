<div class="sm:flex sm:justify-between sm:items-center mb-8">

    <!-- Left: Avatars -->
    <ul class="flex flex-wrap justify-center sm:justify-start mb-8 sm:mb-0 -space-x-3 -ml-px">
        <li>
            <a class="block" href="#0">
                <img class="w-9 h-9 rounded-full" src="<?php echo e(asset('img/user-36-01.jpg')); ?>" width="36" height="36" alt="User 01" />
            </a>
        </li>
        <li>
            <a class="block" href="#0">
                <img class="w-9 h-9 rounded-full" src="<?php echo e(asset('img/user-36-02.jpg')); ?>" width="36" height="36" alt="User 02" />
            </a>
        </li>
        <li>
            <a class="block" href="#0">
                <img class="w-9 h-9 rounded-full" src="<?php echo e(asset('img/user-64-09.jpg')); ?>" width="36" height="36" alt="User 03" />
            </a>
        </li>
        <li>
            <a class="block" href="#0">
                <img class="w-9 h-9 rounded-full" src="<?php echo e(asset('img/user-36-04.jpg')); ?>" width="36" height="36" alt="User 04" />
            </a>
        </li>
        <li>
            <button class="flex justify-center items-center w-9 h-9 rounded-full bg-white border border-gray-200 hover:border-gray-300 text-indigo-500 shadow-sm transition duration-150 ml-2">
                <span class="sr-only">Add new user</span>
                <svg class="w-4 h-4 fill-current" viewBox="0 0 16 16">
                    <path d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z" />
                </svg>
            </button>
        </li>
    </ul>

    <!-- Right: Actions -->
    <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">

        <!-- Filter button -->
        <div class="relative inline-flex" x-data="{ open: false }">
            <button
                class="btn bg-white border-gray-200 hover:border-gray-300 text-gray-500 hover:text-gray-600"
                aria-haspopup="true"
                @click.prevent="open = !open"
                :aria-expanded="open"
            >
                <span class="sr-only">Filter</span><wbr>
                <svg class="w-4 h-4 fill-current" viewBox="0 0 16 16">
                    <path d="M9 15H7a1 1 0 010-2h2a1 1 0 010 2zM11 11H5a1 1 0 010-2h6a1 1 0 010 2zM13 7H3a1 1 0 010-2h10a1 1 0 010 2zM15 3H1a1 1 0 010-2h14a1 1 0 010 2z" />
                </svg>
            </button>
            <div
                class="origin-top-right z-10 absolute top-full left-0 right-auto md:left-auto md:right-0 min-w-56 bg-white border border-gray-200 pt-1.5 rounded shadow-lg overflow-hidden mt-1"
                @click.outside="open = false"
                @keydown.escape.window="open = false"
                x-show="open"
                x-transition:enter="transition ease-out duration-200 transform"
                x-transition:enter-start="opacity-0 -translate-y-2"
                x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease-out duration-200"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                x-cloak
            >
                <div class="text-xs font-semibold text-gray-400 uppercase pt-1.5 pb-2 px-4">Filters</div>
                <ul class="mb-4">
                    <li class="py-1 px-3">
                        <label class="flex items-center">
                            <input type="checkbox" class="form-checkbox" checked />
                            <span class="text-sm font-medium ml-2">Direct VS Indirect</span>
                        </label>
                    </li>
                    <li class="py-1 px-3">
                        <label class="flex items-center">
                            <input type="checkbox" class="form-checkbox" checked />
                            <span class="text-sm font-medium ml-2">Real Time Value</span>
                        </label>
                    </li>
                    <li class="py-1 px-3">
                        <label class="flex items-center">
                            <input type="checkbox" class="form-checkbox" checked />
                            <span class="text-sm font-medium ml-2">Top Channels</span>
                        </label>
                    </li>
                    <li class="py-1 px-3">
                        <label class="flex items-center">
                            <input type="checkbox" class="form-checkbox" />
                            <span class="text-sm font-medium ml-2">Sales VS Refunds</span>
                        </label>
                    </li>
                    <li class="py-1 px-3">
                        <label class="flex items-center">
                            <input type="checkbox" class="form-checkbox" />
                            <span class="text-sm font-medium ml-2">Last Order</span>
                        </label>
                    </li>
                    <li class="py-1 px-3">
                        <label class="flex items-center">
                            <input type="checkbox" class="form-checkbox" />
                            <span class="text-sm font-medium ml-2">Total Spent</span>
                        </label>
                    </li>
                </ul>
                <div class="py-2 px-3 border-t border-gray-200 bg-gray-50">
                    <ul class="flex items-center justify-between">
                        <li>
                            <button class="btn-xs bg-white border-gray-200 hover:border-gray-300 text-gray-500 hover:text-gray-600">Clear</button>
                        </li>
                        <li>
                            <button class="btn-xs bg-indigo-500 hover:bg-indigo-600 text-white" @click="open = false" @focusout="open = false">Apply</button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Datepicker built with flatpickr -->
        <div class="relative">
            <input class="datepicker form-input pl-9 text-gray-500 hover:text-gray-600 font-medium focus:border-gray-300 w-60" placeholder="Select dates" data-class="flatpickr-right" />
            <div class="absolute inset-0 right-auto flex items-center pointer-events-none">
                <svg class="w-4 h-4 fill-current text-gray-500 ml-3" viewBox="0 0 16 16">
                    <path d="M15 2h-2V0h-2v2H9V0H7v2H5V0H3v2H1a1 1 0 00-1 1v12a1 1 0 001 1h14a1 1 0 001-1V3a1 1 0 00-1-1zm-1 12H2V6h12v8z" />
                </svg>
            </div>
        </div>

        <!-- Add view button -->
        <button class="btn bg-indigo-500 hover:bg-indigo-600 text-white">
            <svg class="w-4 h-4 fill-current opacity-50 shrink-0" viewBox="0 0 16 16">
                <path d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z" />
            </svg>
            <span class="hidden xs:block ml-2">Add view</span>
        </button>

    </div>

</div>
<?php /**PATH C:\OpenServer\domains\localhost\pavetra.loc\resources\views\admin\layouts\dashboard-actions.blade.php ENDPATH**/ ?>
<div class="flex flex-col col-span-full sm:col-span-6 xl:col-span-4 bg-white shadow-lg rounded-sm border border-gray-200">
    <div class="px-5 pt-5">
        <header class="flex justify-between items-start mb-2">
            <!-- Icon -->
            <img src="../images/icon-03.svg" width="32" height="32" alt="Icon 03" />
            <!-- Menu button -->
            <div class="relative inline-flex" x-data="{ open: false }">
                <button
                    class="text-gray-400 hover:text-gray-500 rounded-full"
                    :class="{ 'bg-gray-100 text-gray-500': open }"
                    aria-haspopup="true"
                    @click.prevent="open = !open"
                    :aria-expanded="open"
                >
                    <span class="sr-only">Menu</span>
                    <svg class="w-8 h-8 fill-current" viewBox="0 0 32 32">
                        <circle cx="16" cy="16" r="2" />
                        <circle cx="10" cy="16" r="2" />
                        <circle cx="22" cy="16" r="2" />
                    </svg>
                </button>
                <div
                    class="origin-top-right z-10 absolute top-full right-0 min-w-36 bg-white border border-gray-200 py-1.5 rounded shadow-lg overflow-hidden mt-1"
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
                    <ul>
                        <li>
                            <a class="font-medium text-sm text-gray-600 hover:text-gray-800 flex py-1 px-3" href="#0" @click="open = false" @focus="open = true" @focusout="open = false">Option 1</a>
                        </li>
                        <li>
                            <a class="font-medium text-sm text-gray-600 hover:text-gray-800 flex py-1 px-3" href="#0" @click="open = false" @focus="open = true" @focusout="open = false">Option 2</a>
                        </li>
                        <li>
                            <a class="font-medium text-sm text-red-500 hover:text-red-600 flex py-1 px-3" href="#0" @click="open = false" @focus="open = true" @focusout="open = false">Remove</a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>
        <h2 class="text-lg font-semibold text-gray-800 mb-2">Acme Professional</h2>
        <div class="text-xs font-semibold text-gray-400 uppercase mb-1">Sales</div>
        <div class="flex items-start">
            <div class="text-3xl font-bold text-gray-800 mr-2">$9,962</div>
            <div class="text-sm font-semibold text-white px-1.5 bg-green-500 rounded-full">+29%</div>
        </div>
    </div>
    <!-- Chart built with Chart.js 3 -->
    <!-- Check out src/js/components/dashboard-card-01.js for config -->
    <div class="grow">
        <!-- Change the height attribute to adjust the chart height -->
        <canvas id="dashboard-card-03" width="389" height="128"></canvas>
    </div>
</div>
<?php /**PATH C:\OpenServer\domains\localhost\pavetra.loc\resources\views\admin\partials\dashboard-card-03.blade.php ENDPATH**/ ?>
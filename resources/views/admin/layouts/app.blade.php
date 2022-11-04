<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf_token" content="{{ csrf_token() }}" />
    <title>@yield('title') :: Pavetra</title>
    <link rel="shortcut icon" href="{{ asset('public/img/favicon.png') }}" type="image/x-icon">
    <link href="{{ asset('public/admin/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('public/admin/css/summernote-lite.min.css') }}" rel="stylesheet">
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
        @include('admin.layouts.sidebar')

        <!-- Content area -->
        <div class="relative flex flex-col flex-1 overflow-y-auto overflow-x-hidden">

            <!-- Site header -->
            @include('admin.layouts.header')

            <main>
                <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
                        @yield('main')
                    </div>

                </div>
            </main>

        </div>

    </div>

    <script src="{{ asset('public/admin/js/main.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="{{ asset('public/admin/js/summernote-lite.min.js') }}"></script>
    <script src="{{ asset('public/admin/js/jquery-ui.min.js') }}"></script>

    <script src="{{ asset('public/admin/js/custom.js') }}"></script>
</body>

</html>

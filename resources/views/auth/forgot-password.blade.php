<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title') :: Pavetra</title>
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}" type="image/x-icon">
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
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
                            <img width="120" src="{{ asset('img/logo-blue.png') }}" alt="Pavetra logo">
                        </a>
                    </div>
                </div>

                <div class="max-w-sm mx-auto px-4 py-8">

                    <h1 class="text-3xl text-gray-800 font-bold mb-6">{{ __('admin.reset_password') }}</h1>
                    <div class="mb-4 text-sm text-gray-600">
                        {{ __('admin.forgot_password_text') }}
                    </div>
                    <!-- Form -->
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium mb-1" for="email">{{ __('admin.email_adress') }} <span class="text-red-500">*</span></label>
                                <input id="email" class="form-input w-full" type="email" name="email" value="{{ old('email') }}" required autofocus />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                        </div>
                        <div class="flex items-center justify-between mt-6">
                            <button class="btn bg-indigo-500 hover:bg-indigo-600 text-white">{{ __('admin.email_password_reset_link') }}</button>
                        </div>
                    </form>
                    <!-- Footer -->

                </div>

            </div>

        </div>

        <!-- Image -->
        <div class="hidden md:block absolute top-0 bottom-0 right-0 md:w-1/2" aria-hidden="true">
            <img class="object-cover object-center w-full h-full" src="{{ asset('img/auth-image.jpg') }}" width="760" height="1024" alt="{{ __('admin.authentication') }}" />
        </div>

    </div>

</main>


<script src="{{ asset('admin/js/main.js') }}"></script>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title') :: Pavetra</title>
    <link rel="shortcut icon" href="{{ asset('public/img/favicon.png') }}" type="image/x-icon">
    <link href="{{ asset('public/admin/css/style.css') }}" rel="stylesheet">
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

                    <h1 class="text-3xl text-gray-800 font-bold mb-6">{{ __('admin.dashboard') }}</h1>
                    <!-- Form -->
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium mb-1" for="email">{{ __('admin.email_adress') }}</label>
                                <input id="email" class="form-input w-full" type="email" name="email" value="{{ old('email') }}" required autofocus />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1" for="password">{{ __('admin.password') }}</label>
                                <input id="password" class="form-input w-full" type="password" name="password" required autocomplete="current-password" />
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                        </div>
                        <div class="flex items-center justify-between mt-6">
                            <div class="mr-1">
                                <a class="text-sm underline hover:no-underline" href="{{ route('password.request') }}">{{ __('admin.forgot_password') }}</a>
                            </div>
                            <button class="btn bg-indigo-500 hover:bg-indigo-600 text-white ml-3">{{ __('admin.log_in') }}</button>
                        </div>
                    </form>
                    <!-- Footer -->
                    <div class="pt-5 mt-6 border-t border-gray-200">
                        <div class="text-sm">
                            {{ __('admin.dont_have_an_account') }} <a class="font-medium text-indigo-500 hover:text-indigo-600" href="{{ route('register') }}">{{ __('admin.sign_up') }}</a>
                        </div>
                        <!-- Warning -->
                        {{-- <div class="mt-5">
                            <div class="bg-yellow-100 text-yellow-600 px-3 py-2 rounded">
                                <svg class="inline w-3 h-3 shrink-0 fill-current" viewBox="0 0 12 12">
                                    <path d="M10.28 1.28L3.989 7.575 1.695 5.28A1 1 0 00.28 6.695l3 3a1 1 0 001.414 0l7-7A1 1 0 0010.28 1.28z" />
                                </svg>
                                <span class="text-sm">
                                    To support you during the pandemic super pro features are free until March 31st.
                                </span>
                            </div>
                        </div> --}}
                    </div>

                </div>

            </div>

        </div>

        <!-- Image -->
        <div class="hidden md:block absolute top-0 bottom-0 right-0 md:w-1/2" aria-hidden="true">
            <img class="object-cover object-center w-full h-full" src="{{ asset('img/auth-image.jpg') }}" width="760" height="1024" alt="{{ __('admin.authentication') }}" />
        </div>

    </div>

</main>


<script src="{{ asset('public/admin/js/main.js') }}"></script>
</body>

</html>

{{--
<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-primary-button class="ml-3">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Sign In | TailAdmin - Tailwind CSS Admin Dashboard Template</title>
    <link rel="icon" href="favicon.ico">
    <link href="style.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body x-data="{ page: 'comingSoon', 'loaded': true, 'darkMode': false, 'stickyMenu': false, 'sidebarToggle': false, 'scrollTop': false }"
      x-init="darkMode = JSON.parse(localStorage.getItem('darkMode'));
      $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))"
      :class="{'dark bg-gray-900': darkMode === true}">

    <!-- Preloader -->
    <div x-show="loaded"
         x-init="window.addEventListener('DOMContentLoaded', () => {setTimeout(() => loaded = false, 500)})"
         class="fixed left-0 top-0 z-999999 flex h-screen w-screen items-center justify-center bg-white dark:bg-black">
        <div class="h-16 w-16 animate-spin rounded-full border-4 border-brand-500 border-t-transparent"></div>
    </div>

    <!-- Page Wrapper -->
    <div class="relative p-6 bg-white z-1 dark:bg-gray-900 sm:p-0">
        <div class="relative flex flex-col justify-center w-full h-screen dark:bg-gray-900 sm:p-0 lg:flex-row">

            <!-- Form -->
            <div class="flex flex-col flex-1 w-full lg:w-1/2">
                <div class="flex flex-col justify-center flex-1 w-full max-w-md mx-auto">
                    <div>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="space-y-5">

                                {{-- Name --}}
                                <div>
                                    <label for="name" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                        Name <span class="text-error-500">*</span>
                                    </label>
                                    <input id="name" type="text" name="name" value="{{ old('name') }}" required
                                           placeholder="Enter your full name"
                                           class="h-11 w-full rounded-lg border px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400
                                                  dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800" />
                                    @error('name')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- Email --}}
                                <div>
                                    <label for="email" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                        Email <span class="text-error-500">*</span>
                                    </label>
                                    <input id="email" type="email" name="email" value="{{ old('email') }}" required
                                           placeholder="Enter your email"
                                           class="h-11 w-full rounded-lg border px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400
                                                  dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800" />
                                    @error('email')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- Password --}}
                                <div>
                                    <label for="password" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                        Password <span class="text-error-500">*</span>
                                    </label>
                                    <input id="password" type="password" name="password" required
                                           placeholder="Enter your password"
                                           class="h-11 w-full rounded-lg border px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400
                                                  dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800" />
                                    @error('password')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- Confirm Password --}}
                                <div>
                                    <label for="password_confirmation" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                        Confirm Password <span class="text-error-500">*</span>
                                    </label>
                                    <input id="password_confirmation" type="password" name="password_confirmation" required
                                           placeholder="Confirm your password"
                                           class="h-11 w-full rounded-lg border px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400
                                                  dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800" />
                                </div>

                                {{-- Submit --}}
                                <div>
                                    <button type="submit"
                                            class="flex items-center justify-center w-full px-4 py-3 text-sm font-medium text-white transition rounded-lg bg-brand-500 shadow-theme-xs hover:bg-brand-600">
                                        Sign Up
                                    </button>
                                </div>
                            </div>
                        </form>

                        <div class="mt-5 text-center">
                            <p class="text-sm text-gray-700 dark:text-gray-400">
                                Already have an account?
                                <a href="{{ route('login') }}" class="text-brand-500 hover:text-brand-600 dark:text-brand-400">
                                    Login
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Panel -->
            <div class="relative items-center hidden w-full h-full bg-brand-950 dark:bg-white/5 lg:grid lg:w-1/2">
                <div class="flex items-center justify-center z-1">
                    <div class="absolute right-0 top-0 -z-1 w-full max-w-[250px] xl:max-w-[450px]">
                        <img src="{{ asset('images/shape/grid-01.svg') }}" alt="grid" />
                    </div>
                    <div class="absolute bottom-0 left-0 -z-1 w-full max-w-[250px] rotate-180 xl:max-w-[450px]">
                        <img src="{{ asset('images/shape/grid-01.svg') }}" alt="grid" />
                    </div>

                    <div class="flex flex-col items-center max-w-xs">
                        <a href="/" class="block mb-4">
                            <img src="{{ asset('images/logo/digi_ai_logo_dark.png') }}" alt="Logo" />
                        </a>
                        <p class="text-center text-gray-400 dark:text-white/60">
                            Free and Open-Source Tailwind CSS Admin Dashboard Template
                        </p>
                    </div>
                </div>
            </div>

            <!-- Dark Mode Toggle -->
            <div class="fixed z-50 hidden bottom-6 right-6 sm:block">
                <button @click.prevent="darkMode = !darkMode"
                        class="inline-flex items-center justify-center text-white rounded-full size-14 bg-brand-500 hover:bg-brand-600">
                    <!-- Dark/Light Mode Icons -->
                    <svg class="hidden fill-current dark:block" width="20" height="20" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="..."/>
                    </svg>
                    <svg class="fill-current dark:hidden" width="20" height="20" viewBox="0 0 20 20">
                        <path d="..."/>
                    </svg>
                </button>
            </div>

        </div>
    </div>
</body>
</html>

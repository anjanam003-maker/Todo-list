<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="relative min-h-screen overflow-hidden bg-slate-50">
            <div aria-hidden="true" class="pointer-events-none absolute inset-0 bg-gradient-to-br from-rose-100 via-white to-white"></div>
            <div aria-hidden="true" class="pointer-events-none absolute -top-28 left-1/2 h-80 w-80 -translate-x-1/2 rounded-full bg-[#e36d9b] opacity-25 blur-3xl"></div>
            <div aria-hidden="true" class="pointer-events-none absolute -bottom-28 right-0 h-80 w-80 rounded-full bg-indigo-200 opacity-40 blur-3xl"></div>

            <div class="relative flex min-h-screen items-center justify-center px-4 py-10 sm:px-6">
                <div class="w-full max-w-5xl overflow-hidden rounded-2xl bg-white/80 shadow-xl ring-1 ring-black/5 backdrop-blur">
                    <div class="grid lg:grid-cols-2">
                        <div class="hidden lg:flex flex-col justify-between bg-[#e36d9b] p-10 text-white">
                            <a href="/" class="inline-flex items-center gap-3">
                                <x-application-logo class="h-10 w-10 fill-current text-white" />
                                <span class="text-xl font-semibold tracking-tight">{{ config('app.name', 'ToDo') }}</span>
                            </a>

                            <div class="mt-10">
                                <h1 class="text-3xl font-semibold leading-tight">Make your day done.</h1>
                                <p class="mt-3 text-white/90">A simple list that keeps you focused.</p>

                                <div class="mt-8 space-y-4 text-sm text-white/90">
                                    <div class="flex gap-3">
                                        <span class="mt-0.5 inline-flex h-6 w-6 items-center justify-center rounded-full bg-white/15">
                                            <svg viewBox="0 0 20 20" fill="none" class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path d="M7.5 10.5l1.9 1.9L12.8 9" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </span>
                                        <span>Track pending and completed tasks</span>
                                    </div>
                                    <div class="flex gap-3">
                                        <span class="mt-0.5 inline-flex h-6 w-6 items-center justify-center rounded-full bg-white/15">
                                            <svg viewBox="0 0 20 20" fill="none" class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path d="M7.5 10.5l1.9 1.9L12.8 9" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </span>
                                        <span>Add items quickly with a clean interface</span>
                                    </div>
                                    <div class="flex gap-3">
                                        <span class="mt-0.5 inline-flex h-6 w-6 items-center justify-center rounded-full bg-white/15">
                                            <svg viewBox="0 0 20 20" fill="none" class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path d="M7.5 10.5l1.9 1.9L12.8 9" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </span>
                                        <span>Stay organized across all your days</span>
                                    </div>
                                </div>
                            </div>

                            <div class="text-xs text-white/75">
                                © {{ now()->format('Y') }} {{ config('app.name', 'ToDo') }}
                            </div>
                        </div>

                        <div class="p-8 sm:p-10">
                            <div class="lg:hidden mb-8 text-center">
                                <a href="/" class="inline-flex items-center gap-3">
                                    <x-application-logo class="h-10 w-10 fill-current text-[#e36d9b]" />
                                    <span class="text-2xl font-semibold tracking-tight text-gray-900">{{ config('app.name', 'ToDo') }}</span>
                                </a>
                                <p class="mt-2 text-sm text-gray-600">Make your day done.</p>
                            </div>

                            <div class="mx-auto w-full max-w-md">
                                {{ $slot }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

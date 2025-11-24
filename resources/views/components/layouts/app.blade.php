<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-cloak x-data="{
    darkMode: false,
    sticky: false,
    showNav: false
}"
    x-bind:class="{ 'dark': darkMode }" x-init="if (!('darkMode' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches) {
        localStorage.setItem('darkMode', JSON.stringify(true));
    }
    darkMode = JSON.parse(localStorage.getItem('darkMode'));
    $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <link rel="sitemap" type="application/xml" href="{{ asset('sitemap.xml') }}" />

    <title>{{ isset($title) ? $title . ' | CodeWithKyrian' : 'CodeWithKyrian' }}</title>

    {{ $meta ?? '' }}

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @if (app()->isProduction())
        <script defer src="{{ url('um-script.js') }}" data-website-id="1809c923-309b-45e2-8c77-b54e6f06c90d" data-spa="auto"></script>
    @endif
</head>

<body class="bg-zinc-50 dark:bg-zinc-900" @scroll.window="sticky = window.scrollY > 100">

    <header class="top-0 z-[100]" :class="{ 'sticky animate-[slideDown_0.3s_ease-out]': sticky }">
        <nav class="relative px-6 py-2.5 border-b backdrop-blur border-zinc-200 lg:px-12 dark:border-zinc-700/60"
            :class="{ 'bg-zinc-50/50 dark:bg-zinc-900/50': sticky, 'bg-transparent': !sticky }">
            <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
                <a href="/" class="flex items-center">
                    <img src="{{ asset('logo.png') }}" class="mr-3 h-6 sm:h-9" alt="CodeWithKyrian Logo" />
                    <span
                        class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">CodeWithKyrian</span>
                </a>
                <div class="flex items-center lg:order-2">
                    <button x-on:click="darkMode = !darkMode" type="button"
                        class="inline-flex items-center p-2 ml-1 text-sm rounded-lg border border-transparent text-zinc-500 hover:border-zinc-200 focus:outline-none focus:border-zinc-200 dark:text-zinc-400 dark:hover:border-zinc-700/60 dark:focus:border-zinc-700/60">
                        <span class="sr-only">Toggle dark mode</span>
                        <span class="relative w-5 h-5">
                            <span x-cloak x-show="!darkMode" x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 transform translate-y-2"
                                x-transition:enter-end="opacity-100 transform translate-y-0" class="absolute inset-0">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                                </svg>
                            </span>
                            <span x-cloak x-show="darkMode" x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 transform -translate-y-2"
                                x-transition:enter-end="opacity-100 transform translate-y-0" class="absolute inset-0">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                        fill-rule="evenodd" clip-rule="evenodd"></path>
                                </svg>
                            </span>
                        </span>
                    </button>
                    <button x-on:click="showNav = !showNav" x-bind:aria-expanded="showNav" aria-label="Menu"
                        class="inline-flex items-center p-0.5 ml-1 text-sm rounded-lg harmburger lg:hidden text-zinc-500 hover:bg-zinc-100 focus:outline-none focus:ring-2 focus:ring-zinc-200 dark:text-zinc-400 dark:hover:bg-zinc-700 dark:focus:ring-zinc-600">
                        <svg :class="{ 'open': showNav }" class="w-8 h-8 transition-transform duration-400"
                            viewBox="0 0 100 100" fill="none" stroke="currentColor" stroke-width="6">
                            <path class="top"
                                d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20" />
                            <path class="middle" d="m 30,50 h 40" />
                            <path class="bottom"
                                d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20" />
                        </svg>
                    </button>
                </div>

                <div :class="{ 'hidden': !showNav, 'flex': showNav }"
                    class="justify-between items-center w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu">
                    <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                        <li>
                            <a wire:navigate href="{{ route('home') }}" @class([
                                'block uppercase py-2 pr-4 pl-3 lg:p-0',
                                'text-blue-700 dark:text-blue-600 font-bold' => request()->routeIs('home'),
                                'text-zinc-700 hover:text-blue-700 dark:text-zinc-300 dark:hover:text-blue-600' => !request()->routeIs(
                                    'home'),
                            ])>Home</a>
                        </li>
                        <li>
                            <a wire:navigate href="{{ route('about') }}" @class([
                                'block uppercase py-2 pr-4 pl-3 lg:p-0',
                                'text-blue-700 dark:text-blue-600 font-bold' => request()->routeIs('about'),
                                'text-zinc-700 hover:text-blue-700 dark:text-zinc-300 dark:hover:text-blue-600' => !request()->routeIs(
                                    'about'),
                            ])>
                                About Me
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main
        class="flex flex-wrap justify-center px-4 bg-fixed bg-center mg:px-6 lg:px-8 bg-dots-darker dark:bg-dots-lighter">
        {{ $slot }}
    </main>
    <footer class="w-full border-t border-zinc-200 dark:border-zinc-700/60">
        <div class="p-4 py-6 mx-auto max-w-screen-xl md:p-8">
            <div class="text-center">
                <a wire:navigate href="/"
                    class="flex justify-center items-center mb-5 text-2xl font-semibold text-zinc-900 dark:text-white">
                    <img src="{{ asset('logo.png') }}" class="mr-3 h-6 sm:h-9" alt="CodeWithKyrian Logo" />
                    CodeWithKyrian
                </a>
                <span class="block text-sm text-center text-zinc-500 dark:text-zinc-400">
                    © 2022-2023 <a wire:navigate href="/" class="hover:underline">CodeWithKyrian™</a>. All Rights
                    Reserved.
                </span>
                <ul class="flex justify-center mt-5 space-x-5">
                    <li>
                        <a id="facebook-footer" href="https://web.facebook.com/CodeWithKyrian/" target="_blank"
                            class="text-zinc-500 hover:text-zinc-900 dark:hover:text-white dark:text-zinc-400">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a id="instagram-footer" href="https://www.instagram.com/codewithkyrian/" target="_blank"
                            class="text-zinc-500 hover:text-zinc-900 dark:hover:text-white dark:text-zinc-400">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a id="twitter-footer" href="https://twitter.com/CodeWithKyrian" target="_blank"
                            class="text-zinc-500 hover:text-zinc-900 dark:hover:text-white dark:text-zinc-400">
                            @svg('si-x', 'size-5')
                        </a>
                    </li>
                    <li>
                        <a id="github-footer" href="https://github.com/CodeWithKyrian" target="_blank"
                            class="text-zinc-500 hover:text-zinc-900 dark:hover:text-white dark:text-zinc-400">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.linkedin.com/in/kyrian-obikwelu" target="_blank"
                            class="text-zinc-500 hover:text-zinc-900 dark:hover:text-white dark:text-zinc-400">

                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path
                                    d="M5.372 24H.396V7.976h4.976V24ZM2.882 5.79C1.29 5.79 0 4.474 0 2.883a2.882 2.882 0 1 1 5.763 0c0 1.59-1.29 2.909-2.881 2.909ZM23.995 24H19.03v-7.8c0-1.86-.038-4.243-2.587-4.243-2.587 0-2.984 2.02-2.984 4.109V24H8.49V7.976h4.772v2.186h.07c.664-1.259 2.287-2.587 4.708-2.587 5.035 0 5.961 3.316 5.961 7.623V24h-.005Z" />
                            </svg>

                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>
</body>

</html>

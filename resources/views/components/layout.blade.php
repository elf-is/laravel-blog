<!doctype html>

<html lang="en">
<head>
    <title>Laravel From Scratch Blog</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>
<style>
    html{
        scroll-behavior: smooth;
    }
    /* Change the white to any color */
    input:-webkit-autofill,
    input:-webkit-autofill:hover,
    input:-webkit-autofill:focus,
    input:-webkit-autofill:active
    {
        -webkit-box-shadow: 0 0 0 30px rgba(229, 231, 235,1) inset !important;
    }
</style>
<body style="font-family: Open Sans, sans-serif">
<section class="px-6 py-8">
    <nav class="md:flex md:justify-between md:items-center">
        <div>
            <a href="/">
                <img src="/images/logo.svg" alt="Laracasts Logo" width="165" height="16">
            </a>
        </div>

        <div class="mt-8 md:mt-0 flex items-center">
            @auth

                <x-dropdown>
                    <x-slot name="trigger">
                        <button class="text-xs font-bold uppercase">Welcome, {{ auth()->user()->name }}!</button>
                    </x-slot>
                    <x-dropdown-item href="/admin/dashboard">Dashboard</x-dropdown-item>
                    <x-dropdown-item href="/admin/posts/create">New Post</x-dropdown-item>
                </x-dropdown>

                <form method="POST" action="/logout" class="text-xs font-semibold text-blue-500 ml-4">
                    @csrf
                    <button type="submit">Log Out</button>
                </form>
            @else
                <a href="/register" class="text-xs font-bold uppercase">Register</a>
                <a href="/login" class="ml-4 text-xs font-bold uppercase">Log In</a>
            @endauth

            <a href="#newsletter" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                Subscribe for Updates
            </a>
        </div>
    </nav>

    {{ $slot }}

    <footer class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
        <img src="/images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;">
        <h5 class="text-3xl">Stay in touch with the latest posts</h5>
        <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>

        <div class="mt-10">
            <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">
                <form method="POST" action="/newsletter" class="lg:flex text-sm" id="newsletter">
                    @csrf
                    <div class="lg:py-3 lg:px-5 flex items-center">
                        <label for="email" class="hidden lg:inline-block">
                            <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                        </label>
                        <input id="email"
                               type="text"
                               name="email"
                               placeholder="Your email address"
                               class="mb-2 lg:mb-0 bg-gray-200 border lg:border-none border-gray-200 rounded-full lg:rounded-none py-2 lg:py-0 pl-4 focus-within:outline-none">
                        @error('email')
                        <div x-data="{ show: true }"
                             x-init="setTimeout(() => show = false, 4000)"
                             x-show="show"
                             class="fixed bg-red-500 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-sm"
                        >
                            <p>{{$message}}</p>
                        </div>
                        @enderror
                    </div>
                    <x-button class="rounded-full py-3 lg:py-0">Subscribe</x-button>
                </form>
            </div>
        </div>
    </footer>
</section>

<x-flash/>
</body>
</html>
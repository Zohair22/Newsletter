
<!doctype html>
<head>
    <title>Laravel From Scratch Blog</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
    <style>
        html{
            scroll-behavior: smooth;
        }
    </style>
</head>
<body>
<section>
    <nav class="md:flex md:justify-between md:items-center m-0 py-2 px-6 bg-gray-100">
        <div>
            <a href="{{ route('posts') }}">
                <img src="{{ asset('storage/images/logo.svg') }}" alt="Laracasts Logo" width="165" height="16">
            </a>
        </div>

        <div class="mt-8 md:mt-0 flex items-center">
            @auth
                <x-dropdown>
                    <x-slot name="trigger">
                        <button class="text-sm font-bold mr-3">Welcome, {{ ucwords(auth()->user()->name) }}</button>
                    </x-slot>
                    <div class="mt-3">
                        @admin
                            <x-dropdown-item href="{{ route('adminPosts')}}"
                                             active="{{ request()->routeIs('adminPosts') }}">All Posts
                            </x-dropdown-item>
                            <x-dropdown-item href="{{ route('postCreate') }}"
                                             active="{{ request()->routeIs('postCreate') }}">New Post
                            </x-dropdown-item>
                        @endadmin
                        <x-dropdown-item href="{{ route('logout') }}" class="font-semibold uppercase">logout</x-dropdown-item>
                    </div>
                </x-dropdown>

            @else
                <a href="{{ route('loginForm') }}" class="text-sm uppercase font-semibold text-blue-500 hover:text-blue-700">login</a>
                <p class="mx-4">|</p>
                <a href="{{ route('registerForm') }}" class="text-sm uppercase font-semibold text-blue-500 hover:text-blue-700">register</a>
            @endauth

            <a href="#newsLetter"
               class="bg-blue-500 hover:bg-gray-100 border border-blue-500 text-white hover:text-blue-500 ml-5 rounded-full text-xs font-semibold uppercase py-2 px-6">
                Subscribe for Updates
            </a>
        </div>
    </nav>
    <div class="px-4 py-2">
        {{ $slot }}
        @auth
            <footer id="newsLetter" class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
                <img src="{{ asset('storage/images/lary-newsletter-icon.svg') }}" alt="" class="mx-auto -mb-6" style="width: 145px;">
                <h5 class="text-3xl">Stay in touch with the latest posts</h5>
                <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>

                <div class="mt-10">
                    <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

                        <form method="POST" action="{{ route('newsletter') }}" class="lg:flex text-sm">
                            @csrf
                            <div class="lg:py-3 lg:px-5 flex items-center">
                                <img src="{{ asset('storage/images/mailbox-icon.svg') }}" alt="mailbox letter">

                                <label for="email" hidden>email</label>
                                <input id="email" name="email" type="text" placeholder="Your email address"
                                       class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">
                            </div>
                            <button type="submit"
                                    class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8"
                            >
                                Subscribe
                            </button>
                        </form>
                    </div>
                    @error('email')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
            </footer>
        @endauth
    </div>
</section>
<x-flash></x-flash>
</body>

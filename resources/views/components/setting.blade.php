

<section class="px-6 py-8 max-w-4xl m-auto">
    <h1 class="text-2xl font-bold text-center mb-8 text-blue-700">
        {{ $heading }}
        <hr class="w-72 m-auto mt-1 mb-0">
    </h1>
    <div class="flex">
        <aside class="w-48">
            <h1 class="font-bold text-lg text-blue-700">Links</h1>
            <hr class="w-40 mt-1 m-0">
            <ul>
                <li>
                    <a href="{{ route('posts')}}" class="mt-2 block {{ request()->routeIs('posts') ? 'text-blue-500' : '' }}">Dashboard</a>
                    <a href="{{ route('postCreate') }}" class="block {{ request()->routeIs('postCreate') ? 'text-blue-500' : ''}}">New Post</a>
                </li>
            </ul>
        </aside>
        <main class="flex-1">
            <x-panel class="bg-gray-100 text-sm">
                {{ $slot }}
            </x-panel>
        </main>
    </div>
</section>

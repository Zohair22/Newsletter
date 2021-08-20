
<x-dropdown>
    <x-slot name="trigger">
        <button class="py-2 pl-3 pr-9 text-sm font-semibold lg:inline-flex w-full lg:w-36">
            {{ isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories' }}
            <x-icon name="down-arrow" class=" absolute pointer-events-none" style="right: 12px;"></x-icon>
        </button>
    </x-slot>
    <x-dropdown-item href="{{ route('posts') }}?{{ http_build_query(request()->except('category','page')) }}" class="{{ isset($currentCategory) ? '':'bg-blue-500 text-white' }}">All</x-dropdown-item>
    @foreach($categories as $category)
        <x-dropdown-item
            href="/?category={{ $category->slug }}&{{ http_build_query(request()->except('category','page')) }}"
            class="{{ isset($currentCategory) && $currentCategory->is($category) ? 'bg-blue-500 text-white':'' }}"
        >
            {{ ucwords($category->name) }}
        </x-dropdown-item>
    @endforeach
</x-dropdown>

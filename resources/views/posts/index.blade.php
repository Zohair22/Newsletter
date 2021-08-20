

<x-layouts>

    @include('posts._header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">

        @if($posts->count())
            <x-posts-grid :posts="$posts"></x-posts-grid>
            {{ $posts->links() }}
        @else
            <p class="text-center">No posts yet, Please check back later.</p>
        @endif
    </main>

</x-layouts>

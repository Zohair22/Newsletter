<article
    {{ $attributes->merge([ "class" => "transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl"]) }} >
    <div class="py-6 px-5">
        <div>
            {{-- TODO --}}
            <a href="{{ route('post',$post->slug) }}">
                <img src="{{ asset($post->thumbnail) }}" alt="Blog Post illustration" class="rounded-3xl">
            </a>
        </div>

        <div class="mt-8 flex flex-col justify-between">
            <header class="mt-8 lg:mt-0">
                <div class="space-x-2">
                    <x-category-button :post="$post"></x-category-button>
                </div>

                <div class="mt-4">

                    <h1 class="text-3xl">
                        {!! $post->title !!}
                    </h1>

                    <span class="mt-2 block text-gray-400 text-xs">
                        Published <time>{!! $post->created_at->diffForHumans() !!}</time>
                    </span>
                </div>
            </header>

            <div class="text-sm mt-2 space-y-4">
                {!! $post->excerpt !!}
            </div>

            <footer class="flex justify-between items-center mt-8">
                <div class="flex items-center text-sm">
                    <img src="{{ asset('storage/images/lary-avatar.png') }}" style="width: 80px" class="rounded-3xl" alt="Lary avatar">
                    <div class="ml-3">
                        <h5 class="font-bold"><a href="/?author={{ $post->author->username }}">{{ $post->author->name }}</a></h5>
                    </div>
                </div>

                <div class="hidden lg:block">
                    <a href="{{ route('post',$post->slug) }}"
                       class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8"
                    >Read More</a>
                </div>
            </footer>
        </div>
    </div>
</article>

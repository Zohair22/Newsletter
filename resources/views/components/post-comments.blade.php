

<x-panel class="bg-gray-50" >
    <article class="flex space-x-4">
        <div class="flex-shrink-0">
            <img src="https://i.pravatar.cc/60?u={{ $comment->user_id }}" width="60" height="60" alt="Avatar" class="rounded-3xl">
        </div>
        <div>
            <header class="mb-4">
                <h3 class="font-bold">{{ $comment->author->name }}</h3>
                <p class="text-xs ">Commented <time>{!! $comment->created_at->format('F j, Y, g:i a') !!}</time></p>
            </header>
            <p>
                {{ $comment->body }}
            </p>
        </div>
    </article>
</x-panel>

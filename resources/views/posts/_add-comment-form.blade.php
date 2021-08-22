
@auth
    <x-panel>
        <form action="{{ route ('comment', $post->slug) }}" method="post">
            @csrf
            <header class="flex space-x-6">
                <img src="https://i.pravatar.cc/40?u={{ auth()->user()->id }}" width="40" height="40" alt="Avatar" class="rounded-full">
                <h2>Want to Participate?</h2>
            </header>

            <x-form.textarea name="body"></x-form.textarea>
            <hr class="mt-10">
            <div class="flex justify-end">
                <x-form.button>Comment</x-form.button>
            </div>
        </form>
    </x-panel>
@else
    <p class="text-center">
        <a href="{{ route('registerForm') }}" class="text-blue-500 font-semibold">Register</a>
        Or
        <a href="{{ route('loginForm') }}" class="text-blue-500 font-semibold">Login</a>
        to leave a Comment!
    </p>
@endauth


<x-layouts>
    <section class="p-8">
        <main class="max-w-lg m-auto mt-10 p-6 bg-gray-100 border border-gray-400 rounded-3xl shadow-2xl">
            <h1 class="text-center font-bold text-xl mb-10">Login</h1>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-6">
                    <label for="email" class="block mb-2 uppercase font-bold  text-xs text-gray-700">email:</label>
                    <input type="email" class="border border-gray-400 p-2 w-full" name="email" value="{{ old('email') }}" id="email" required>
                </div>

                <div class="mb-6">
                    <label for="password" class="block mb-2 uppercase font-bold  text-xs text-gray-700">password:</label>
                    <input type="password" class="border border-gray-400 p-2 w-full" name="password" value="{{ old('password') }}" id="password" required>
                    @error('password')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                @if($errors->any())
                    <ul class="mb-6">
                        @foreach($errors->all() as $error)
                            <li class="text-red-500 text-sm">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif

                <div class="mb-6">
                    <button type="submit" class="text-blue-500 text-sm border border-blue-500 uppercase font-semibold hover:text-white hover:bg-blue-500 rounded-xl px-7 py-1 ml-10">login</button>
                </div>

            </form>
        </main>
    </section>
</x-layouts>

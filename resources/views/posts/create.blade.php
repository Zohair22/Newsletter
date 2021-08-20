

<x-layouts>
    <section class="px-6 py-8 ">
        <x-panel class="max-w-2xl m-auto">
            <h1 class="text-xl font-bold mb-4 text-center text-blue-700">Publish new Post</h1>
            <form action="{{ route('postStore') }}" method="POST">
                @csrf

                <div class="mb-6">
                    <label for="title" class="block mb-2 uppercase font-bold  text-xs text-gray-700">title:</label>
                    <input type="text" class="border border-gray-400 p-2 w-full" name="title" value="{{ old('title') }}" id="title" required>
                    @error('title')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="excerpt" class="block mb-2 uppercase font-bold  text-xs text-gray-700">excerpt:</label>
                    <textarea class="border border-gray-400 p-2 w-full" name="excerpt" id="excerpt"  required>{{ old('excerpt') }}</textarea>
                    @error('excerpt')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="body" class="block mb-2 uppercase font-bold  text-xs text-gray-700">body:</label>
                    <textarea class="border border-gray-400 p-2 w-full" name="body" id="body"  required>{{ old('body') }}</textarea>
                    @error('body')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>


                <div class="mb-6">
                    <label for="slug" class="block mb-2 uppercase font-bold  text-xs text-gray-700">slug:</label>
                    <input type="text" class="border border-gray-400 p-2 w-full" name="slug" value="{{ old('slug') }}" id="slug" required>
                    @error('slug')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="category_id" class="block mb-2 uppercase font-bold  text-xs text-gray-700">category:</label>
                    <select name="category_id" id="category_id" class="border border-gray-400 p-2 w-full">
                        <option class="disabled">Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"  {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ ucwords($category->name)  }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                <x-submit-button>Publish</x-submit-button>
            </form>
        </x-panel>
    </section>
</x-layouts>

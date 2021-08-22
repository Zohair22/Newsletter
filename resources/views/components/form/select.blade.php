

<div class="select-none">
    <label for="{{ $name }}" class="block mb-2 uppercase font-bold text-xs text-gray-700">category:</label>
    <select name="{{ $name }}"
            id="{{ $name }}"
            size="4"
            required
            class="border border-gray-300 py-2 px-4 w-full rounded-3xl text-black-primary focus:outline-none"
    >
        <option class="text-gray-400 text-lg" value="" disabled>Select Category</option>
        @foreach($options as $category)
            <option value="{{ $category->id }}" {{ old($name) === $category->id ? 'selected' : '' }}>{{ ucwords($category->name)  }}</option>
        @endforeach
    </select>
    @error($name)
    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
    @enderror
</div>


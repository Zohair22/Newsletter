@props(['name'])

<div>
    <label for="{{ $name }}" class="block mb-2 uppercase font-bold text-gray-700">{{ $name }}:</label>
    <textarea
        class="border border-gray-300 w-full py-2 px-5 rounded-3xl focus:outline-none"
        name="{{ $name }}" id="{{ $name }}"  required {{ $attributes }}
    >{{ $slot }}</textarea>
    @error($name)
    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
    @enderror
</div>

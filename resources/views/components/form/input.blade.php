@props(['name', 'attributes'])

<div>
    <label for="{{ $name }}" class="block mb-2 uppercase font-bold text-gray-700">{{ $name }}:</label>
    <input
           class="border border-gray-300 py-2 px-4 w-full rounded-3xl focus:outline-none"
           name="{{ $name }}" id="{{ $name }}" {{ $attributes }}
    >
    @error($name)
    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
    @enderror
</div>

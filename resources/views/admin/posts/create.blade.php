

<x-layouts>
    <x-setting heading="Publish New Post">
        <form action="{{ route('postStore') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <x-form.input type="text" name="title" autocomplete="title"  value="{{ old('title') }}"></x-form.input>
            <x-form.input type="text" name="slug" autocomplete="slug"  value="{{ old('slug') }}"></x-form.input>
            <x-form.input name="thumbnail" type="file"  value="{{ old('file') }}"></x-form.input>
            <x-form.textarea name="excerpt" autocomplete="excerpt">{{ old('excerpt') }}</x-form.textarea>
            <x-form.textarea name="body" autocomplete="body">{{ old('body') }}</x-form.textarea>
            <x-form.select name="category_id">
                <option class="text-gray-400 text-lg" value="" disabled>Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') === $category->id ? 'selected' : '' }}>{{ ucwords($category->name)  }}</option>
                @endforeach
            </x-form.select>
            <input type="hidden" name="user_id" value="{{ auth()->id() }}">

            <x-form.button>Publish</x-form.button>
        </form>
    </x-setting>
</x-layouts>

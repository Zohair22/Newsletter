

<x-layouts>
    <x-setting heading='Edit Post: "{!!  $post->title  !!}"'>

        <form action="{{ route('postUpdate', $post->slug) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <x-form.input type="text" name="title" autocomplete="title" value="{{ old('title', $post->title) }}"></x-form.input>
            <x-form.input type="text" name="slug" autocomplete="slug" value="{{ old('slug', $post->slug) }}"></x-form.input>
            <div class="flex mt-6 ">
                <div class="flex-1">
                    <x-form.input name="thumbnail" type="file" value="{!! old('thumbnail', $post->thumbnail) !!}"></x-form.input>
                </div>
                <img src="{{ asset($post->thumbnail) }}" class="rounded-xl ml-5" width="100">
            </div>

            <x-form.textarea name="excerpt" autocomplete="excerpt">{{ old('excerpt', $post->excerpt) }}</x-form.textarea>
            <x-form.textarea name="body" autocomplete="body">{{ old('body', $post->body) }}</x-form.textarea>

            <x-form.select name="category_id">
                <option class="text-gray-400 text-lg" value="" disabled>Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) === $category->id ? 'selected' : '' }}>{{ ucwords($category->name)  }}</option>
                @endforeach
            </x-form.select>

            <input type="hidden" name="user_id" value="{{ $post->user_id }}">
            <input type="hidden" name="published_at" value="{{ $post->published_at }}">

            <x-form.button>Update</x-form.button>
        </form>

    </x-setting>
</x-layouts>

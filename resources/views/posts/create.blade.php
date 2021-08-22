

<x-layouts>
    <x-setting heading="Publish New Post">
        <form action="{{ route('postStore') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <x-form.input type="text" name="title" autocomplete="title"></x-form.input>
            <x-form.input type="text" name="slug" autocomplete="slug"></x-form.input>
            <x-form.input name="thumbnail" type="file"></x-form.input>
            <x-form.textarea name="excerpt" autocomplete="excerpt"></x-form.textarea>
            <x-form.textarea name="body" autocomplete="body"></x-form.textarea>
            <x-form.select name="category_id" :options="$categories"></x-form.select>
            <input type="hidden" name="user_id" value="{{ auth()->id() }}">

            <x-form.button>Publish</x-form.button>
        </form>
    </x-setting>
</x-layouts>
